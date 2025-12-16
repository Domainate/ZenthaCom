jQuery(function ($) {
    console.log('hash', window.location.hash);

    if (window.location.hash) {
        var data = JSON.parse(base64ToUtf8(window.location.hash.replace('#', '')));
        // Log the JSON data to check its structure and properties
        console.log('main2js', data);

        // Function to append data only if not already present
        function appendData(selector, key, value) {
            if ($(selector).find(`.wb-${key.replace(' ', '-')}`).length === 0) {
                $(selector).append(`
                    <li>
                        <span class="wb-${key.replace(' ', '-')}"></span>
                        ${value.Gate}.${value.Line}
                    </li>
                `);
            }
        }

        // Loop through the design data
        for (const [key, value] of Object.entries(data.Design)) {
            appendData('.design', key, value);
        }

        // Loop through the personality data
        for (const [key, value] of Object.entries(data.Personality)) {
            appendData('.personality', key, value);
        }


        // Append the Skills & Attributes to the list if it's not already present
        if ($('#chart-properties ul').find("li:contains('Name:')").length === 0) {
            var ProfileName = data.Properties['Name'];

            if (ProfileName && ProfileName.option) {
                $('#chart-properties ul').append(`
                    <li>
                        <strong>Name:</strong> ${ProfileName.option}
                    </li>
                `);
            }
        }

        // Loop through the chart properties and append only if not already present
        const chartProperties = [
            { key: 'BirthDateLocal', label: 'Birth Date Local', hasId: false }, // 'BirthDateLocal' doesn't have an id
            { key: 'Age', label: 'Age', hasId: false }, // 'Age' doesn't have an id
            { key: 'Type', label: 'Type', hasId: true },
            { key: 'Strategy', label: 'Strategy', hasId: true },
            { key: 'InnerAuthority', label: 'Inner Authority', hasId: true },
            { key: 'Definition', label: 'Definition', hasId: true },
            { key: 'Profile', label: 'Profile', hasId: true },
            { key: 'IncarnationCross', label: 'Incarnation Cross', hasId: true },
            { key: 'Signature', label: 'Signature', hasId: true },
            { key: 'NotSelfTheme', label: 'Not Self Theme', hasId: true },
            { key: 'Digestion', label: 'Digestion', hasId: true },
            { key: 'Sense', label: 'Sense', hasId: true },
            { key: 'DesignSense', label: 'Design Sense', hasId: true },
            { key: 'Motivation', label: 'Motivation', hasId: true },
            { key: 'Perspective', label: 'Perspective', hasId: true },
            { key: 'Environment', label: 'Environment', hasId: true },
            { key: 'DecisionMakingStrategy', label: 'Decision-Making Strategy', hasId: true }
        ];

        // Append chart properties if not already present
        chartProperties.forEach(function (property) {
            var propertyValue = data.Properties[property.key];

            // Check if property has an id, or just use the value directly
            var displayValue = property.hasId && propertyValue && propertyValue.id ? propertyValue.id : propertyValue || 'No Value Available';

            // Only append if not already present
            if ($('#chart-properties ul').find(`li:contains('${property.label}:')`).length === 0) {
                $('#chart-properties ul').append(`
                    <li>
                        <strong>${property.label}:</strong> ${displayValue}
                    </li>
                `);
            }
        });


        // Check if 'Gates:' is already in the list
        if ($('#chart-properties ul').find("li:contains('Gates:')").length === 0) {
            var gates = data.Properties['Gates'];

            if (gates && gates.list && Array.isArray(gates.list)) {
                // Create an array of gate IDs
                var gateIds = gates.list.map(function (gate) {
                    return gate.id;
                });

                // Join the gate IDs into a comma-separated string
                var gatesList = gateIds.join(', ');

                // Append the Gates IDs to the list
                $('#chart-properties ul').append(`
                    <li>
                        <strong>Gates:</strong> ${gatesList}
                    </li>
                `);
            }
        }

        // Append the Skills & Attributes to the list if it's not already present
        if ($('#chart-properties ul').find("li:contains('Skills & Attributes:')").length === 0) {
            var skillsAndAttributes = data.Properties['BusinessCompetencesAndQualities'];

            if (skillsAndAttributes && skillsAndAttributes.option) {
                $('#chart-properties ul').append(`
                    <li>
                        <strong>Skills & Attributes:</strong> ${skillsAndAttributes.option}
                    </li>
                `);
            }
        }


        // Check for Defined Centers and apply styles if needed
        for (var definedCenter in data['DefinedCenters']) {
            var el = $(`#${data['DefinedCenters'][definedCenter].replace(/\s+/g, '-').toLowerCase()}`);

            if (el.length) {
                el.attr('fill', '#BFA161');
            }
        }

        // Handle Variables and add right class where applicable
        if (data.Variables['Digestion'] == 'right') {
            $('#variable-digestion')
                .removeClass('wb-left')
                .addClass('wb-right');
        }

        if (data.Variables['Environment'] == 'right') {
            $('#variable-environment')
                .removeClass('wb-left')
                .addClass('wb-right');
        }

        if (data.Variables['Awareness'] == 'right') {
            $('#variable-awareness')
                .removeClass('wb-left')
                .addClass('wb-right');
        }

        if (data.Variables['Perspective'] == 'right') {
            $('#variable-perspective')
                .removeClass('wb-left')
                .addClass('wb-right');
        }

        // Tooltip functionality
        $('[data-tooltip]').hover(function (evt) {
            $(`<div class="hd-tooltip">${$(this).data('tooltip')}</div>`)
                .offset({ top: evt.clientY, left: evt.clientX })
                .appendTo(document.body);
        }, function () {
            $('.hd-tooltip').remove();
        });

        // Additional handling of text elements
        $('text').each(function () {
            var el = jQuery(this)
                .prev();

            var gateNumber = el.attr('id');

            if (hasGate(data, gateNumber)) {
                el.css('fill', '#000000');

                el.next()
                    .css('fill', '#FFFFFF');
            }
        });

        // Handle design and personality colors based on gate values
        $('[id^=design-], [id^=personality-]').each(function () {
            var el = $(this);

            var gateNumber = el.attr('id')
                .split('-')[1];

            var designValues = Object.values(data.Design),
                personalityValues = Object.values(data.Personality);

            var designGate = null;

            for (var key in designValues) {
                if (designValues[key].Gate == gateNumber) {
                    designGate = true;
                }
            }

            var personalityGate = null;

            for (var key in personalityValues) {
                if (personalityValues[key].Gate == gateNumber) {
                    personalityGate = true;
                }
            }

            if (designGate != null && personalityGate != null) {
                $(`#design-${gateNumber}`)
                    .css('fill', '#4e4e4e');

                $(`#personality-${gateNumber}`)
                    .css('fill', '#d0b171');

                fixLine(el);
            } else if (designGate != null) {
                el.css('fill', '#4e4e4e');

                fixLine(el);
            } else if (personalityGate != null) {
                el.css('fill', '#d0b171');

                fixLine(el);
            }
        });

    }

});

// Function to check if a gate exists in design or personality data
function hasGate(data, gateNumber) {
    var design = Object.values(data.Design);

    for (var key in design) {
        if (design[key].Gate == gateNumber) {
            return true;
        }
    }

    var personality = Object.values(data.Personality);

    for (var key in personality) {
        if (personality[key].Gate == gateNumber) {
            return true;
        }
    }

    return false;
}

// Function to fix the line (optional feature)
function fixLine(el) {
    var parent = el.parent();

    if (parent.attr('id') == '20-57-10-34-20-34-10-57') {
        el.show();
    }
}

// Functions for encoding and decoding UTF8/Base64
function utf8ToBase64(str) {
    return btoa(unescape(encodeURIComponent(str)));
}

function base64ToUtf8(str) {
    return decodeURIComponent(escape(atob(str)));
}
