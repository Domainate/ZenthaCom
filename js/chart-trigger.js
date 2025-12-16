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
    var parent = el.parentElement;
    if (parent.id == '20-57-10-34-20-34-10-57') {
        el.style.display = 'block';
    }
}

// Function to append data only if not already present
function appendData(selector, key, value) {
    var container = document.querySelector(selector);
    if (!container.querySelector(`.wb-${key.replace(' ', '-')}`)) {
        var li = document.createElement('li');
        li.innerHTML = `
            <span class="wb-${key.replace(' ', '-')}"></span>
            ${value.Gate}.${value.Line}
        `;
        container.appendChild(li);
    }
}

function setChartDataToChartContainer(chartData) {
    if (!chartData) return;
    const data = chartData;

    // Loop through the design data
    for (const [key, value] of Object.entries(data.Design)) {
        appendData('.design', key, value);
    }

    // Loop through the personality data
    for (const [key, value] of Object.entries(data.Personality)) {
        appendData('.personality', key, value);
    }

    // Append the Skills & Attributes to the list if it's not already present
    var chartPropertiesUl = document.querySelector('#chart-properties ul');
    if (!chartPropertiesUl.querySelector("li strong[contains='Name:']")) {
        var ProfileName = data.Properties['Name'];
        if (ProfileName && ProfileName.option) {
            var li = document.createElement('li');
            li.innerHTML = `<strong>Name:</strong> ${ProfileName.option}`;
            chartPropertiesUl.appendChild(li);
        }
    }

    // Loop through the chart properties and append only if not already present
    const chartProperties = [{
        key: 'BirthDateLocal',
        label: 'Birth Date Local',
        hasId: false
    },
    {
        key: 'Age',
        label: 'Age',
        hasId: false
    },
    {
        key: 'Type',
        label: 'Type',
        hasId: true
    },
    {
        key: 'Strategy',
        label: 'Strategy',
        hasId: true
    },
    {
        key: 'InnerAuthority',
        label: 'Inner Authority',
        hasId: true
    },
    {
        key: 'Definition',
        label: 'Definition',
        hasId: true
    },
    {
        key: 'Profile',
        label: 'Profile',
        hasId: true
    },
    {
        key: 'IncarnationCross',
        label: 'Incarnation Cross',
        hasId: true
    },
    {
        key: 'Signature',
        label: 'Signature',
        hasId: true
    },
    {
        key: 'NotSelfTheme',
        label: 'Not Self Theme',
        hasId: true
    },
    {
        key: 'Digestion',
        label: 'Digestion',
        hasId: true
    },
    {
        key: 'Sense',
        label: 'Sense',
        hasId: true
    },
    {
        key: 'DesignSense',
        label: 'Design Sense',
        hasId: true
    },
    {
        key: 'Motivation',
        label: 'Motivation',
        hasId: true
    },
    {
        key: 'Perspective',
        label: 'Perspective',
        hasId: true
    },
    {
        key: 'Environment',
        label: 'Environment',
        hasId: true
    },
    {
        key: 'DecisionMakingStrategy',
        label: 'Decision-Making Strategy',
        hasId: true
    }
    ];

    chartProperties.forEach(function (property) {
        var propertyValue = data.Properties[property.key];
        var displayValue = property.hasId && propertyValue && propertyValue.id ? propertyValue.id : propertyValue || 'No Value Available';
        "li strong[contains='Name:']"
        if (!chartPropertiesUl.querySelector(`li strong('${property.label}:')`)) {
            var li = document.createElement('li');
            li.innerHTML = `<strong>${property.label}:</strong> ${displayValue}`;
            chartPropertiesUl.appendChild(li);
        }
    });

    // Check if 'Gates:' is already in the list
    if (!chartPropertiesUl.querySelector("li:contains('Gates:')")) {
        var gates = data.Properties['Gates'];
        if (gates && gates.list && Array.isArray(gates.list)) {
            var gateIds = gates.list.map(function (gate) {
                return gate.id;
            });
            var gatesList = gateIds.join(', ');
            var li = document.createElement('li');
            li.innerHTML = `<strong>Gates:</strong> ${gatesList}`;
            chartPropertiesUl.appendChild(li);
        }
    }

    // Append the Skills & Attributes to the list if it's not already present
    if (!chartPropertiesUl.querySelector("li:contains('Skills & Attributes:')")) {
        var skillsAndAttributes = data.Properties['BusinessCompetencesAndQualities'];
        if (skillsAndAttributes && skillsAndAttributes.option) {
            var li = document.createElement('li');
            li.innerHTML = `<strong>Skills & Attributes:</strong> ${skillsAndAttributes.option}`;
            chartPropertiesUl.appendChild(li);
        }
    }

    // Check for Defined Centers and apply styles if needed
    for (var definedCenter in data['DefinedCenters']) {
        var el = document.querySelector(`#${data['DefinedCenters'][definedCenter].replace(/\s+/g, '-').toLowerCase()}`);
        if (el) {
            el.setAttribute('fill', '#BFA161');
        }
    }

    // Handle Variables and add right class where applicable
    if (data.Variables['Digestion'] == 'right') {
        var digestionEl = document.querySelector('#variable-digestion');
        digestionEl.classList.remove('wb-left');
        digestionEl.classList.add('wb-right');
    }

    if (data.Variables['Environment'] == 'right') {
        var environmentEl = document.querySelector('#variable-environment');
        environmentEl.classList.remove('wb-left');
        environmentEl.classList.add('wb-right');
    }

    if (data.Variables['Awareness'] == 'right') {
        var awarenessEl = document.querySelector('#variable-awareness');
        awarenessEl.classList.remove('wb-left');
        awarenessEl.classList.add('wb-right');
    }

    if (data.Variables['Perspective'] == 'right') {
        var perspectiveEl = document.querySelector('#variable-perspective');
        perspectiveEl.classList.remove('wb-left');
        perspectiveEl.classList.add('wb-right');
    }

    // Tooltip functionality
    document.querySelectorAll('[data-tooltip]').forEach(function (el) {
        el.addEventListener('mouseover', function (evt) {
            var tooltip = document.createElement('div');
            tooltip.className = 'hd-tooltip';
            tooltip.textContent = el.getAttribute('data-tooltip');
            tooltip.style.position = 'absolute';
            tooltip.style.top = `${evt.clientY}px`;
            tooltip.style.left = `${evt.clientX}px`;
            document.body.appendChild(tooltip);
        });

        el.addEventListener('mouseout', function () {
            var tooltip = document.querySelector('.hd-tooltip');
            if (tooltip) {
                tooltip.remove();
            }
        });
    });

    // Additional handling of text elements
    document.querySelectorAll('text').forEach(function (el) {
        var prevEl = el.previousElementSibling;
        var gateNumber = prevEl.id;

        if (hasGate(data, gateNumber)) {
            prevEl.style.fill = '#000000';
            el.style.fill = '#FFFFFF';
        }
    });

    // Handle design and personality colors based on gate values
    document.querySelectorAll('[id^=design-], [id^=personality-]').forEach(function (el) {
        var gateNumber = el.id.split('-')[1];
        var designValues = Object.values(data.Design),
            personalityValues = Object.values(data.Personality);

        var designGate = designValues.some(function (value) {
            return value.Gate == gateNumber;
        });

        var personalityGate = personalityValues.some(function (value) {
            return value.Gate == gateNumber;
        });

        if (designGate && personalityGate) {
            document.querySelector(`#design-${gateNumber}`).style.fill = '#4e4e4e';
            document.querySelector(`#personality-${gateNumber}`).style.fill = '#d0b171';
            fixLine(el);
        } else if (designGate) {
            el.style.fill = '#4e4e4e';
            fixLine(el);
        } else if (personalityGate) {
            el.style.fill = '#d0b171';
            fixLine(el);
        }
    });
}

