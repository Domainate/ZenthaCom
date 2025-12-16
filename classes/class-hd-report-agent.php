<?php


class HDReportAgent
{
    protected $apiKey = ANTROPHIC_KEY;
    protected $userPrompt = "";
    protected $reportPrompt = "";
    protected $chartData;
    protected $apiUrl = 'https://api.anthropic.com/v1/messages';
    protected $apiVersion = '2023-06-01';
    protected $anthropicBeta = 'output-128k-2025-02-19';
    protected $maxToken = 30000;
    protected $model = 'claude-3-7-sonnet-20250219';

    public function __construct($userPrompt, $reportPrompt, $chartData)
    {
        $this->userPrompt = $userPrompt;
        $this->reportPrompt = $reportPrompt;
        $this->chartData = $chartData;
    }

    public function setApiKey($apiKey): void
    {
        $this->apiKey = $apiKey;
    }

    public function getApiKey(): mixed
    {
        return $this->apiKey;
    }

    public function basePrompt(): string
    {
        return <<<EOD
You are an expert in Human Design and Gene Keys.
Your task is to write a personalized Human Design {report_type} Report for a person.

Begin the report with:
- Full Name
- Date and Time of Birth
- Location of Birth (always override with the provided value even if the chart data says "Unknown").

Throughout the report:
- Use only the person's first name when referring to them.
- Direct the report toward them as the reader.
- The report must be at least 3,000 words.
- Format it using valid HTML with <h2>, <h3>, <p>, <ul>, <ol>, <li>, <strong>, and <em> tags (no Markdown).

You will also receive:
- A report prompt describing the focus
- Raw chart data from BodyGraphChart
EOD;
    }

    protected function buildPayload(): array
    {
        return [
            'body' => json_encode([
                'model' => $this->model,
                'max_tokens' => $this->maxToken,
                'system' => [
                    [
                        "type" => "text",
                        "text" => $$this->basePrompt(),
                        "cache_control" => ["type" => "ephemeral"]
                    ],
                    [
                        "type" => "text",
                        "text" => "Use the following as the focus of the report: " . $this->reportPrompt,
                        "cache_control" => ["type" => "ephemeral"]
                    ],
                    [
                        "type" => "text",
                        "text" => 'Here is the raw chart data (remember to override location if it says "Unknown"):' . print_r($this->chartData, true),
                        "cache_control" => ["type" => "ephemeral"]
                    ],
                ],
                'messages' => [
                    [
                        'role' => 'user',
                        'content' => $this->userPrompt
                    ],
                ],
            ]),

            'headers' => [
                'Content-Type' => 'application/json',
                'x-api-key' => $this->apiKey,             // Anthropic uses x-api-key instead of Authorization 
                'anthropic-version' => $this->apiVersion, // Required API version header
                'anthropic-beta' => $this->anthropicBeta, // Beta header for 128k tokens
            ],
            'timeout' => 300, // Increased timeout for longer responses
        ];
    }

    public function sendRequest(): string|WP_Error|null
    {
        $args = $this->buildPayload();
        $response = wp_remote_post($this->apiUrl, $args);

        if (is_wp_error($response)) {
            return $response; // Return WP_Error for handling
        }

        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (empty($data['content'][0]['text'])) {
            return new WP_Error('api_error', 'No content returned from Anthropic API');
        }
        return trim($data['content'][0]['text']);
    }
}