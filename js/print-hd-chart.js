document.addEventListener('DOMContentLoaded', function () {
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
        var parent = el.parentNode;
        if (parent.id == '20-57-10-34-20-34-10-57') {
            el.style.display = 'block';
        }
    }

    function processChartData(data) {
        document.querySelector('#chart-properties ul').innerHTML = '';
        document.querySelector('#bgchart-human-design-bodychart ul.design').innerHTML = '';
        document.querySelector('#bgchart-human-design-bodychart ul.personality').innerHTML = '';

        const gates = data?.Properties?.['Gates']?.list?.map(i => i.id);

        const exalted = `<div class="hdapi-fixing-state"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 10 10"><path d="M9.698 8.57L5.899.601A1 1 0 0 0 4.095.598L.261 8.566A1 1 0 0 0 1.162 10h7.633a1 1 0 0 0 .903-1.43z" fill="white" fill-rule="evenodd"></path></svg></div>`;
        const detriment = `<div class="hdapi-fixing-state"><svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 10 10"><path d="M9.655 1.427L5.904 9.369a1 1 0 0 1-1.808.001L.338 1.428A1 1 0 0 1 1.242 0h7.508a1 1 0 0 1 .904 1.427z" fill="white" fill-rule="evenodd"></path></svg></div>`

        for (const [key, value] of Object.entries(data.Design)) {
            document.querySelector('.design').insertAdjacentHTML('beforeend', `
			<li style="display: inline-flex;flex-wrap: nowrap; gap: 0.25rem; align-items: center;width:100%;justify-content: flex-end;min-width: fit-content;">
				<span class="wb-${key.replace(' ', '-')}"></span>
                ${value.FixingState !== 'None' ? (value.FixingState === 'Detriment' ? detriment : exalted) : ''}
				${value.Gate}.${value.Line}
			</li>
		`);
        }

        for (const [key, value] of Object.entries(data.Personality)) {
            document.querySelector('.personality').insertAdjacentHTML('beforeend', `
			<li style="display: inline-flex;flex-wrap: nowrap; gap: 0.25rem; align-items: center;width:100%;justify-content: flex-end;min-width: fit-content;">
				<span class="wb-${key.replace(' ', '-')}"></span>
                ${value.FixingState !== 'None' ? (value.FixingState === 'Detriment' ? detriment : exalted) : ''}
				${value.Gate}.${value.Line}
			</li>
		`);
        }

        document.querySelectorAll('text').forEach(function (el) {
            var prevEl = el.previousElementSibling;
            var gateNumber = Number(prevEl.id);

            if (gates.includes(gateNumber)) {
                prevEl.style.fill = '#444444';
                el.style.fill = '#f3f6f4';
            } else {
                prevEl.style.fill = '#f3f6f4';
                el.style.fill = '#444444';
            }
        });

        document.querySelectorAll('[id^=design-], [id^=personality-]').forEach(el => el.style.fill = '#ffffff');

        document.querySelectorAll('[id^=design-], [id^=personality-]').forEach(function (el) {
            var gateNumber = Number(el.id.split('-')[1]);

            var designValues = Object.values(data.Design),
                personalityValues = Object.values(data.Personality);

            var designGate = designValues.some(item => Number(item.Gate) === gateNumber && gates.includes(gateNumber));
            var personalityGate = personalityValues.some(item => Number(item.Gate) === gateNumber && gates.includes(gateNumber));
            // console.log('gate---' + gateNumber, designGate, personalityGate);
            if (designGate && personalityGate) {
                document.querySelector(`#design-${gateNumber}`).style.fill = '#8c732c';
                document.querySelector(`#personality-${gateNumber}`).style.fill = '#dccb94';
                fixLine(el);
            } else if (designGate) {
                // el.css('fill', '#4e4e4e');
                document.querySelector(`#design-${gateNumber}`).style.fill = '#8c732c';
                document.querySelector(`#personality-${gateNumber}`).style.fill = '#8c732c';
                fixLine(el);
            } else if (personalityGate) {
                // el.css('fill', '#d0b171');
                document.querySelector(`#design-${gateNumber}`).style.fill = '#dccb94';
                document.querySelector(`#personality-${gateNumber}`).style.fill = '#dccb94';
                fixLine(el);
            }
        });

        ['Digestion', 'Environment', 'Awareness', 'Perspective'].forEach(variable => {
            if (data.Variables[variable] == 'right') {
                const el = document.querySelector(`#variable-${variable.toLowerCase()}`);
                if (el) {
                    el.classList.remove('wb-left');
                    el.classList.add('wb-right');
                }
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

            if (!document.querySelector('#chart-properties ul').querySelector(`li strong[data-key="${property.key}"]`)) {
                document.querySelector('#chart-properties ul').insertAdjacentHTML('beforeend',
                    `<li><strong data-key="${property.key}">${property.label}:</strong> ${displayValue}</li>`
                );
            }
        });

        // Check if 'Gates:' is already in the list
        if (!Array.from(document.querySelectorAll('#chart-properties ul li')).some(li => li.textContent.includes('Gates:'))) {
            if (gates && Array.isArray(gates)) {
                // Join the gate IDs into a comma-separated string
                var gatesList = gates.join(', ');
                // Append the Gates IDs to the list
                document.querySelector('#chart-properties ul').insertAdjacentHTML('beforeend', `
                <li>
                    <strong>Gates:</strong> ${gatesList}
                </li>
            `);
            }
        }

        if (!Array.from(document.querySelectorAll('#chart-properties ul li')).some(li => li.textContent.includes('Defined Centers:'))) {
            var items = data.Properties['DefinedCenters'];
            if (items && items.list && Array.isArray(items.list)) {
                // Create an array of gate IDs
                var ids = items.list.map(function (gate) {
                    return gate.id;
                });
                // Join the gate IDs into a comma-separated string
                var itemsList = ids.join(', ');
                // Append the Gates IDs to the list
                document.querySelector('#chart-properties ul').insertAdjacentHTML('beforeend', `
                <li>
                    <strong>Defined Centers:</strong> ${itemsList}
                </li>
            `);
            }
        }
        if (!Array.from(document.querySelectorAll('#chart-properties ul li')).some(li => li.textContent.includes('Open Centers:'))) {
            var items = data.Properties['OpenCenters'];
            if (items && items.list && Array.isArray(items.list)) {
                // Create an array of gate IDs
                var ids = items.list.map(function (gate) {
                    return gate.id;
                });
                // Join the gate IDs into a comma-separated string
                var itemsList = ids.join(', ');
                // Append the Gates IDs to the list
                document.querySelector('#chart-properties ul').insertAdjacentHTML('beforeend', `
                <li>
                    <strong>Open Centers:</strong> ${itemsList}
                </li>
            `);
            }
        }
        if (!Array.from(document.querySelectorAll('#chart-properties ul li')).some(li => li.textContent.includes('Channels:'))) {
            var items = data['Channels'];
            if (items && Array.isArray(items)) {
                // Create an array of gate IDs
                var ids = items.map(function (gate) {
                    return gate;
                });
                // Join the gate IDs into a comma-separated string
                var itemsList = ids.join(', ');
                // Append the Gates IDs to the list
                document.querySelector('#chart-properties ul').insertAdjacentHTML('beforeend', `
                <li>
                    <strong>Channels:</strong> ${itemsList}
                </li>
            `);
            }
        }

        // Append the Skills & Attributes to the list if it's not already present
        if (!Array.from(document.querySelectorAll('#chart-properties ul li')).some(li => li.textContent.includes('Skills & Attributes:'))) {
            var skillsAndAttributes = data.Properties['BusinessCompetencesAndQualities'];
            if (skillsAndAttributes && skillsAndAttributes.option) {
                document.querySelector('#chart-properties ul').insertAdjacentHTML('beforeend', `
                <li>
                    <strong>Skills & Attributes:</strong> ${skillsAndAttributes.option}
                </li>
            `);
            }
        }


        if (data.Variables['Digestion'] == 'right') {
            const el = document.querySelector('#variable-digestion');
            if (el) {
                el.classList.remove('wb-left');
                el.classList.add('wb-right');
            }
        }

        if (data.Variables['Environment'] == 'right') {
            const el = document.querySelector('#variable-environment');
            if (el) {
                el.classList.remove('wb-left');
                el.classList.add('wb-right');
            }
        }

        if (data.Variables['Awareness'] == 'right') {
            const el = document.querySelector('#variable-awareness');
            if (el) {
                el.classList.remove('wb-left');
                el.classList.add('wb-right');
            }
        }

        if (data.Variables['Perspective'] == 'right') {
            const el = document.querySelector('#variable-perspective');
            if (el) {
                el.classList.remove('wb-left');
                el.classList.add('wb-right');
            }
        }

        // Check for Defined Centers and apply styles if needed
        // for (var definedCenter in data['DefinedCenters']) {
        //     var el = jQuery(`#${data['DefinedCenters'][definedCenter].replace(/\s+/g, '-').toLowerCase()}`);
        //     if (el.length) {
        //         el.attr('fill', '#BFA161');
        //     }
        // }

        const centers = [
            {
                id: 'solar plexus center',
                selector: 'solar-plexus-center',
                active: '#e5cfb5'
            },
            {
                id: 'heart center',
                selector: 'heart-center',
                active: '#9f6261'
            },
            {
                id: 'splenic center',
                selector: 'splenic-center',
                active: '#e5cfb5'
            },
            {
                id: 'root center',
                selector: 'root-center',
                active: '#e5cfb5'
            },
            {
                id: 'sacral center',
                selector: 'sacral-center',
                active: '#9f6261'
            },
            {
                id: 'g center',
                selector: 'g-center',
                active: '#e7ba72'
            },
            {
                id: 'throat center',
                selector: 'throat-center',
                active: '#e5cfb5'
            },
            {
                id: 'ajna center',
                selector: 'ajna-center',
                active: '#999876'
            },
            {
                id: 'head center',
                selector: 'head-center',
                active: '#e7ba72'
            },
        ];

        // Get defined and open centers from Properties
        const definedCenters = data?.Properties?.DefinedCenters?.list?.map(c => c.id) || [];
        const openCenters = data?.Properties?.OpenCenters?.list?.map(c => c.id) || [];

        definedCenters.forEach(center => {
            let centerData = centers.find(c => c.id === center.toLowerCase());
            if (centerData) {
                document.querySelector(`#${centerData.selector}`)?.setAttribute('fill', centerData.active);
            }
        });

        openCenters.forEach(center => {
            let centerData = centers.find(c => c.id === center.toLowerCase());
            if (centerData) {
                document.querySelector(`#${centerData.selector}`)?.setAttribute('fill', '#ffffff');
            }
        });

        document.querySelectorAll('[data-tooltip]').forEach(el => {
            el.addEventListener('mouseover', function (evt) {
                const tooltipDiv = document.createElement('div');
                tooltipDiv.classList.add('hd-tooltip');
                tooltipDiv.textContent = this.dataset.tooltip;
                tooltipDiv.style.top = evt.clientY + 'px';
                tooltipDiv.style.left = evt.clientX + 'px';
                document.body.appendChild(tooltipDiv);
            });
            el.addEventListener('mouseout', function () {
                document.querySelector('.hd-tooltip')?.remove();
            });
        });
    }


    console.log('Body Chart Loaded.', chartData);

    processChartData(chartData.charts)

    // When the Print button on Bodygraph is clicked, call window.print()
    const printChartButton = document.querySelector('.btn-print-chart');
    if (printChartButton)
        printChartButton.addEventListener('click', function () {
            window.print();
        });

    // When the Download button on Bodygraph is clicked, generate a PDF of the chart content.
    const downloadChartBtn = document.querySelector('.btn-download-chart');
    if (downloadChartBtn)
        downloadChartBtn.addEventListener('click', function (e) {
            e.preventDefault();
            // Add loading overlay
            openGlobalLoader('Generating PDF...');

            // Show hidden elements
            document.querySelectorAll('.toggle-show-screen-print').forEach(function (el) {
                el.classList.remove('hide-on-screen');
            });
            // Ensure changes take effect before generating the PDF
            requestAnimationFrame(() => {
                setTimeout(function () {
                    var element = document.querySelector('.chart-content');
                    if (!element) {
                        closeGlobalLoader();
                        Toast.fire({ icon: 'error', title: 'Report content not found.' });
                        return;
                    }
                    if (typeof html2pdf === 'undefined') {
                        closeGlobalLoader();
                        Toast.fire({ icon: 'error', title: 'PDF library (html2pdf) not loaded.' });
                        return;
                    }
                    var opt = {
                        margin: 0.5,
                        filename: chartData.pdfName,
                        image: { type: 'jpeg', quality: 0.98 },
                        html2canvas: { scale: 1 },
                        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                    };

                    // Generate PDF after DOM update
                    html2pdf().set(opt).from(element).save().then(function () {
                        // Remove loading overlay 
                        closeGlobalLoader();

                        // Hide elements again after saving
                        document.querySelectorAll('.toggle-show-screen-print').forEach(function (el) {
                            el.classList.add('hide-on-screen');
                        });
                    }).catch(function (err) {
                        closeGlobalLoader();
                        Toast.fire({ icon: 'error', title: 'PDF generation failed.' });
                        console.error('PDF generation error:', err);
                    });

                }, 200); // Short delay to ensure display update
            });
        });

});