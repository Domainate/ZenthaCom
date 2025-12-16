function hasGate(data, gateNumber) {
    var design = Object.values(data.Design);

    for (var key in design) {
        if (Number(design[key].Gate) == Number(gateNumber)) {
            return true;
        }
    }

    var personality = Object.values(data.Personality);

    for (var key in personality) {
        if (Number(personality[key].Gate) === Number(gateNumber)) {
            return true;
        }
    }

    return false;
}

function fixLine(el) {
    var parent = el.parent();
    if (parent.attr('id') == '20-57-10-34-20-34-10-57') {
        el.show();
    }
}

function processChartData(data) {
    jQuery('#chart-properties ul').empty();
    jQuery('#bgchart-human-design-bodychart ul.design').empty();
    jQuery('#bgchart-human-design-bodychart ul.personality').empty();

    const gates = data.Properties?.['Gates']?.list?.map(i => i.id);

    const exalted = `<div class="hdapi-fixing-state"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 10 10"><path d="M9.698 8.57L5.899.601A1 1 0 0 0 4.095.598L.261 8.566A1 1 0 0 0 1.162 10h7.633a1 1 0 0 0 .903-1.43z" fill="white" fill-rule="evenodd"></path></svg></div>`;
    const detriment = `<div class="hdapi-fixing-state"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 10 10"><path d="M9.655 1.427L5.904 9.369a1 1 0 0 1-1.808.001L.338 1.428A1 1 0 0 1 1.242 0h7.508a1 1 0 0 1 .904 1.427z" fill="white" fill-rule="evenodd"></path></svg></div>`

    for (const [key, value] of Object.entries(data.Design)) {
        jQuery('.design').append(`
			<li style="display: inline-flex;flex-wrap: nowrap; gap: 0.25rem; align-items: center;width:100%;justify-content: flex-end;min-width: fit-content;">
				<span class="wb-${key.replace(' ', '-')}"></span>
                ${value.FixingState !== 'None' ? (value.FixingState === 'Detriment' ? detriment : exalted) : ''}
				${value.Gate}.${value.Line}
			</li>
		`);
    }

    for (const [key, value] of Object.entries(data.Personality)) {
        jQuery('.personality').append(`
			<li style="display: inline-flex;flex-wrap: nowrap; gap: 0.25rem; align-items: center;width:100%;justify-content: flex-end;min-width: fit-content;">
				<span class="wb-${key.replace(' ', '-')}"></span>
                ${value.FixingState !== 'None' ? (value.FixingState === 'Detriment' ? detriment : exalted) : ''}
				${value.Gate}.${value.Line}
			</li>
		`);
    }

    jQuery('text').each(function () {
        var el = jQuery(this).prev();
        var gateNumber = Number(el.attr('id'));

        if (gates.includes(gateNumber)) {
            el.css('fill', '#444444');
            el.next().css('fill', '#f3f6f4');
        } else {
            el.css('fill', '#f3f6f4');
            el.next().css('fill', '#444444');
        }
    });

    jQuery('[id^=design-], [id^=personality-]').css('fill', '#ffffff'); // Reset all fills

    jQuery('[id^=design-], [id^=personality-]').each(function () {
        var el = jQuery(this);
        var gateNumber = Number(el.attr('id').split('-')[1]);

        var designValues = Object.values(data.Design),
            personalityValues = Object.values(data.Personality);

        var designGate = designValues.some(item => Number(item.Gate) === gateNumber && gates.includes(gateNumber));
        var personalityGate = personalityValues.some(item => Number(item.Gate) === gateNumber && gates.includes(gateNumber));
        // console.log('gate---' + gateNumber, designGate, personalityGate);
        if (designGate && personalityGate) {
            jQuery(`#design-${gateNumber}`).css('fill', '#dccb94');
            jQuery(`#personality-${gateNumber}`).css('fill', '#8c732c');
            fixLine(el);
        } else if (designGate) {
            // el.css('fill', '#4e4e4e');
            jQuery(`#design-${gateNumber}`).css('fill', '#dccb94');
            jQuery(`#personality-${gateNumber}`).css('fill', '#dccb94');
            fixLine(el);
        } else if (personalityGate) {
            // el.css('fill', '#d0b171');
            jQuery(`#design-${gateNumber}`).css('fill', '#8c732c');
            jQuery(`#personality-${gateNumber}`).css('fill', '#8c732c');
            fixLine(el);
        }
    });

    ['Digestion', 'Environment', 'Awareness', 'Perspective'].forEach(variable => {
        if (data.Variables[variable] == 'right') {
            jQuery(`#variable-${variable.toLowerCase()}`).removeClass('wb-left').addClass('wb-right');
        }
    });

    // Loop through the chart properties and append only if not already present
    const chartProperties = [
        {
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

        if (!jQuery('#chart-properties ul').find(`li strong[data-key="${property.key}"]`).length) {
            jQuery('#chart-properties ul').append(
                `<li><strong data-key="${property.key}">${property.label}:</strong> ${displayValue}</li>`
            );
        }
    });

    // Check if 'Gates:' is already in the list
    if (jQuery('#chart-properties ul').find("li:contains('Gates:')").length === 0) {
        if (gates && Array.isArray(gates)) {
            // Join the gate IDs into a comma-separated string
            var gatesList = gates.join(', ');
            // Append the Gates IDs to the list
            jQuery('#chart-properties ul').append(`
                <li>
                    <strong>Gates:</strong> ${gatesList}
                </li>
            `);
        }
    }

    if (jQuery('#chart-properties ul').find("li:contains('Defined Centers:')").length === 0) {
        var items = data.Properties['DefinedCenters'];
        if (items && items.list && Array.isArray(items.list)) {
            // Create an array of gate IDs
            var ids = items.list.map(function (gate) {
                return gate.id;
            });
            // Join the gate IDs into a comma-separated string
            var itemsList = ids.join(', ');
            // Append the Gates IDs to the list
            jQuery('#chart-properties ul').append(`
                <li>
                    <strong>Defined Centers:</strong> ${itemsList}
                </li>
            `);
        }
    }
    if (jQuery('#chart-properties ul').find("li:contains('Open Centers:')").length === 0) {
        var items = data.Properties['OpenCenters'];
        if (items && items.list && Array.isArray(items.list)) {
            // Create an array of gate IDs
            var ids = items.list.map(function (gate) {
                return gate.id;
            });
            // Join the gate IDs into a comma-separated string
            var itemsList = ids.join(', ');
            // Append the Gates IDs to the list
            jQuery('#chart-properties ul').append(`
                <li>
                    <strong>Open Centers:</strong> ${itemsList}
                </li>
            `);
        }
    }
    if (jQuery('#chart-properties ul').find("li:contains('Channels:')").length === 0) {
        var items = data['Channels'];
        if (items && Array.isArray(items)) {
            // Create an array of gate IDs
            var ids = items.map(function (gate) {
                return gate;
            });
            // Join the gate IDs into a comma-separated string
            var itemsList = ids.join(', ');
            // Append the Gates IDs to the list
            jQuery('#chart-properties ul').append(`
                <li>
                    <strong>Channels:</strong> ${itemsList}
                </li>
            `);
        }
    }

    // Append the Skills & Attributes to the list if it's not already present
    if (jQuery('#chart-properties ul').find("li:contains('Skills & Attributes:')").length === 0) {
        var skillsAndAttributes = data.Properties['BusinessCompetencesAndQualities'];
        if (skillsAndAttributes && skillsAndAttributes.option) {
            jQuery('#chart-properties ul').append(`
                <li>
                    <strong>Skills & Attributes:</strong> ${skillsAndAttributes.option}
                </li>
            `);
        }
    }


    if (data.Variables['Digestion'] == 'right') {
        jQuery('#variable-digestion')
            .removeClass('wb-left')
            .addClass('wb-right');
    }

    if (data.Variables['Environment'] == 'right') {
        jQuery('#variable-environment')
            .removeClass('wb-left')
            .addClass('wb-right');
    }

    if (data.Variables['Awareness'] == 'right') {
        jQuery('#variable-awareness')
            .removeClass('wb-left')
            .addClass('wb-right');
    }

    if (data.Variables['Perspective'] == 'right') {
        jQuery('#variable-perspective')
            .removeClass('wb-left')
            .addClass('wb-right');
    }

    // Check for Defined Centers and apply styles if needed
    // for (var definedCenter in data['DefinedCenters']) {
    //     var el = jQuery(`#${data['DefinedCenters'][definedCenter].replace(/\s+/g, '-').toLowerCase()}`);
    //     if (el.length) {
    //         el.attr('fill', '#BFA161');
    //     }
    // }

    const centers = [
        { id: 'solar plexus center', selector: 'solar-plexus-center', active: '#e5cfb5' },
        { id: 'heart center', selector: 'heart-center', active: '#9f6261' },
        { id: 'splenic center', selector: 'splenic-center', active: '#e5cfb5' },
        { id: 'root center', selector: 'root-center', active: '#e5cfb5' },
        { id: 'sacral center', selector: 'sacral-center', active: '#9f6261' },
        { id: 'g center', selector: 'g-center', active: '#e7ba72' },
        { id: 'throat center', selector: 'throat-center', active: '#e5cfb5' },
        { id: 'ajna center', selector: 'ajna-center', active: '#999876' },
        { id: 'head center', selector: 'head-center', active: '#e7ba72' },
    ];

    data?.DefinedCenters.forEach(center => {
        let centerData = centers.find(c => c.id === center.toLowerCase());
        jQuery(`#${centerData.selector}`).attr('fill', centerData.active);
    });

    data?.OpenCenters.forEach(center => {
        let centerData = centers.find(c => c.id === center.toLowerCase());
        jQuery(`#${centerData.selector}`).attr('fill', '#ffffff');
    });

    jQuery('[data-tooltip]').hover(function (evt) {
        jQuery(`<div class="hd-tooltip">${jQuery(this).data('tooltip')}</div>`)
            .offset({ top: evt.clientY, left: evt.clientX })
            .appendTo(document.body);
    }, function () {
        jQuery('.hd-tooltip').remove();
    });
}
