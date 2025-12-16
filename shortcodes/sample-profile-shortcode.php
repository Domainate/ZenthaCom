<?php

// Prevent direct access to this file
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

function sample_profile_shortcode() {
    // HTML content for the shortcode
    $html = '

<style>
    .bgec-topbar-details .bgec-topbar-inner {
        border-radius: 5px;
        padding: 11px 8px;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        margin-bottom: 15px;
    }
    
    .bgec-topbar-details .bgec-topbar-inner .bgec-topbar-left {
        font-size: 14px;
        font-family: Roboto;
        display: flex;
        align-items: center;
}
    }
    
    .bgec-topbar-details .bgec-topbar-inner .bgec-topbar-left .bgec-select-person {
        display: inline-block;
        vertical-align: middle;
    }
    
    .bgec-topbar-details .bgec-topbar-inner .bgec-topbar-left .bgec-select-person .bgec-select-wrapper {
        width: 250px;
    }
    
    .bgec-select-wrapper {
        position: relative;
        border-radius: 3px;
        border: solid 1px var(--bgec-border-color);
        background: var(--bgec-white-color);
    }
    
    .bgec-topbar-details .bgec-topbar-inner .bgec-topbar-left .bgec-select-person .bgec-select-wrapper select {
        width: 100%;
        padding: 7px 15px;
    }
    
    .bgec-topbar-details .bgec-topbar-inner .bgec-topbar-left select.bgec-select {
        font-size: 14px;
    }
    
    .bgec-select-wrapper .bgec-select {
        appearance: none;
        width: 100%;
        font-size: 16px;
        padding: 10px 15px;
        border: 0px;
        background: transparent;
        position: relative;
        z-index: 2;
        outline: none;
    }
    
    option {
        font-weight: normal;
        display: block;
        padding-block-start: 0px;
        padding-block-end: 1px;
        min-block-size: 1.2em;
        padding-inline: 2px;
        white-space: nowrap;
    }
    
    .bgec-icon-green-btn {
        color: var(--bgec-white-color);
        border: solid 1px var(--bgec-light-green-color);
        padding: 6px 10px;
        border-radius: 3px;
        display: inline-block;
        text-align: center;
        background: var(--bgec-light-green-color);
        cursor: pointer;
        font-size: 14px;
        font-weight: var(--bgec-font-regular);
        line-height: 17px;
        font-family: var(--bgec-font-family);
        text-decoration: none;
        transition: 0.5s;
        min-height: 32px;
    }
    
    .bgec-icon-green-btn {
        color: var(--bgec-white-color);
        border: solid 1px var(--bgec-light-green-color);
        padding: 6px 10px;
        border-radius: 3px;
        display: inline-block;
        text-align: center;
        background: var(--bgec-light-green-color);
        cursor: pointer;
        font-size: 14px;
        font-weight: var(--bgec-font-regular);
        line-height: 17px;
        font-family: var(--bgec-font-family);
        text-decoration: none;
        transition: 0.5s;
        min-height: 32px;
    }
    
    .bgec-icon-transparent-btn {
        background-color: rgb(140, 115, 44) !important;
    }
    
    .bgec-icon-transparent-btn {
        color: var(--bgec-secondary-color);
        border: solid 1px var(--bgec-button-border-color);
        padding: 6px 10px;
        border-radius: 4px;
        display: inline-block;
        text-align: center;
        background: transparent;
        cursor: pointer;
        font-size: 14px;
        font-weight: var(--bgec-font-regular);
        line-height: 17px;
        font-family: var(--bgec-font-family);
        text-decoration: none;
        transition: 0.5s;
        min-height: 32px;
    }
    
    .bgec-icon-transparent-btn svg {
        margin-right: 8px;
        display: inline-block;
        vertical-align: -3px;
    }

    .bgec-main-container {
    max-width: 1040px;
    margin: auto;
    }

    .bgec-chart-wrapper.bgec-chart-result-wrap.bgec-chart-portrait .bgec-chart-details {
        padding-right: 0px;
        max-width: 700px;
        margin: auto;
    }
    .bgec-chart-wrapper.bgec-chart-portrait .bgec-chart-details {
        max-width: 100%;
        flex: 1 1 100%;
    }

    .bgec-multiple-charts {
        max-width: 100%;
        margin: auto;
    }
    .bgec-multiple-charts {
        position: relative;
    }

    .main-wrapper * {
        padding: 0px;
        margin: 0px;
    }

    .bgec-multiple-charts ul {
        display: flex;
        flex-wrap: nowrap;
        padding: 0px;
        margin: 0px;
        list-style: none;
    }

    .bgec-chart-result-wrap .bgec-multiple-charts ul li {
        max-width: 70px;
        flex: 1 1 70px;
    }

    .bgec-features-list-item h3 {
        color: var(--bgec-black-color);
        font-size: 11px;
        font-weight: var(--bgec-font-medium);
        line-height: 13px;
        text-transform: uppercase;
        margin-bottom: 5px;
        font-family: var(--bgec-font-family);
        text-align: center;
    }


    .bgec-features-list-item.purple-box .bgec-single-feature-item {
        padding: 4px 9px;
        position: relative;
    }

    .bgec-features-list-item.purple-box .bgec-single-feature-item {
        padding: 4px 9px;
        position: relative;
    }

    .bgec-features-list-item .bgec-single-feature-item {
        padding: 2px 6px 2px 0px;
        margin-bottom: 1px;
        overflow: hidden;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        border-radius: 2px;
        position: relative;
    }

    .bgec-chart-result-wrap .bgec-multiple-charts ul li:nth-child(2) {
        max-width: calc(100% - 140px);
        flex: 1 1 calc(100% - 140px);
        padding: 0px 10px;
    }

    .bgec-stats-boxes {
        max-width: 250px;
        display: flex;
        -webkit-box-pack: justify;
        justify-content: space-between;
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;
        margin: auto !important;
    }
    .bgec-left-boxes, .bgec-left-boxes div span:not(.arrow-icon), .bgec-left-boxes svg path, .bgec-left-boxes svg path {
        fill: rgb(220, 203, 148) !important;
        color: rgb(220, 203, 148) !important;
    }

    .main-wrapper * {
        padding: 0px;
        margin: 0px;
    }

    .bgec-common-boxes {
        z-index: 1;
    }

    .bgec-left-boxes, .bgec-left-boxes div span:not(.arrow-icon), .bgec-left-boxes svg path, .bgec-left-boxes svg path {
        fill: rgb(220, 203, 148) !important;
        color: rgb(220, 203, 148) !important;
    }

    .bgec-stats-boxes .bgec-common-boxes div svg {
        display: inline-block;
        vertical-align: middle;
        margin-right: 15px;
        margin-left: 15px;
        float: left;
        margin-top: 12px;
        width: initial;
        max-height: initial;
    }

    .bgec-left-boxes, .bgec-left-boxes div span:not(.arrow-icon), .bgec-left-boxes svg path, .bgec-left-boxes svg path {
        fill: rgb(220, 203, 148) !important;
        color: rgb(220, 203, 148) !important;
    }

    .bgec-stats-boxes .bgec-common-boxes div span:not(.arrow-icon) {
        font-size: 20px;
        line-height: 30px;
        display: inline-block;
        position: relative;
        top: 5px;
        color: var(--bgec-theme-color);
        font-family: var(--bgec-font-family);
        font-weight: 500;
        text-align: center;
    }

    .bgec-left-boxes, .bgec-left-boxes div span:not(.arrow-icon), .bgec-left-boxes svg path, .bgec-left-boxes svg path {
        fill: rgb(220, 203, 148) !important;
        color: rgb(220, 203, 148) !important;
    }
    .bgec-stats-boxes .bgec-common-boxes div span sub {
        font-size: 13px;
        display: inline-block;
        font-weight: var(--bgec-font-medium);
        line-height: 15px;
        position: absolute;
        color: inherit;
        font-family: var(--bgec-font-family);
        border-radius: 50%;
        padding: 0px;
        right: -6px;
        bottom: -7px;
    }

    .bgec-features-list-item.bgec-reverse-details .bgec-single-feature-item .bgec-arrow-icon {
        position: absolute;
        right: inherit;
        left: 3px;
        margin-left: 0px;
    }

    .bgec-features-list-item .bgec-single-feature-item i {
        position: relative;
        top: 0px;
        margin-left: 5px;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        flex-direction: column;
        gap: 2px;
        height: 100%;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
    }

    .bgec-features-list-item .bgec-single-feature-item p {
    font-family: var(--bgec-font-family);
    display: inline-block;
    vertical-align: middle;
    padding-left: 6px;
    position: relative;
    top: 0px;
    font-size: 12px;
    font-weight: 400;
    line-height: 23px;
    margin: 0px;
    }

    .bgec-chart-result-wrap .bgec-features-list-item.bgec-reverse-details .bgec-single-feature-item svg {
        fill: rgb(255, 255, 255) !important;
        color: rgb(255, 255, 255) !important;
    }

    .bgec-single-feature-item svg {
        width: 12px;
    }

    .bgec-chart-result-wrap .bgec-features-list-item.bgec-reverse-details .bgec-single-feature-item {
        background: rgb(140, 115, 44) !important;
        color: rgb(255, 255, 255) !important;

    }

    .bgec-chart-result-wrap .bgec-features-list-item.bgec-reverse-details .bgec-single-feature-item {
        -webkit-box-pack: end;
        justify-content: flex-end;
    }

    .bgec-chart-result-wrap .bgec-features-list-item .bgec-single-feature-item {
        padding: 4px 7px;
        background: rgb(220, 203, 148) !important;
    }
    .bgec-features-list-item.golden-box .bgec-single-feature-item {
        padding: 4px 7px;
        -webkit-box-pack: end;
        justify-content: flex-end;
        position: relative;
    }

    .bgec-features-list-item.golden-box .bgec-single-feature-item span {
        line-height: inherit;
        display: inline-block;
        width: 24px;
        height: 24px;
        margin: 0px;
        text-align: center;
    }

    .bgec-features-list-item .bgec-single-feature-item span {
        display: inline-block;
        vertical-align: middle;
        width: 24px;
        height: 24px;
        margin: 0px;
        text-align: center;
    }

    .bgec-features-list-item .bgec-single-feature-item span {
        color: var(--bgec-black-color);
        font-size: 14px;
        display: inline-block;
        vertical-align: middle;
        width: 24px;
        height: 24px;
        font-weight: 800;
        border-radius: 50%;
        margin: auto;
        text-align: center;
        line-height: 24px;
    }

    .bgec-properties-chart-inner ul {
    padding: 0px;
    margin: 0px;
    }

    .bgec-properties-chart-inner ul {
    padding: 0px;
    margin: 0px;
    }

    .bgec-properties-chart-inner ul li {
        margin-bottom: 1px;
        list-style: none;
    }
    
    .bgec-property-single-item {
        display: flex;
        flex-wrap: nowrap;
    } 

    .bgec-chart-wrapper.bgec-chart-result-wrap .bgec-property-single-item .bgec-property-label {
        max-width: 150px;
        flex: 1 1 150px;
    }

    .bgec-property-single-item .bgec-property-label {
        border-right: solid 1px var(--bgec-white-color);
        padding: 8px 10px;
        max-width: 210px;
        flex: 1 1 210px;
        background: rgb(244, 244, 244);
    }

    .bgec-property-single-item .bgec-property-label h3 {
        color: var(--bgec-theme-color);
        font-size: 14px;
        font-weight: 400;
        line-height: 17px;
        margin: 0px;
    }

    .bgec-chart-wrapper.bgec-chart-result-wrap .bgec-property-single-item .bgec-property-content {
        max-width: calc(100% - 150px);
        flex: 1 1 calc(100% - 150px);
    }

    .bgec-property-single-item .bgec-property-content {
        border-left: 0px;
        padding: 8px 15px;
        position: relative;
        max-width: calc(100% - 210px);
        flex: 1 1 calc(100% - 210px);
        overflow-wrap: break-word;
    }

    .bgec-property-single-item .bgec-property-content p {
        color: var(--bgec-theme-color);
        font-size: 14px;
        font-weight: 400;
        line-height: 16px;
        padding-right: 20px;
        margin: 0px;
    }

    .bgec-property-single-item .bgec-property-content .bgec-action-property {
        position: absolute;
        right: 7px;
        top: 6px;
    }
    .bgec-action-topbar a {
        margin: 5px;
    }
</style>';

$html .='
        <article class="bgec-main-container">
            <section>

                <!--TOP BAR -->
                <div class="bgec-topbar-details">
                    <div class="bgec-topbar-inner" style="background-color: rgb(250, 250, 250); border: 0px solid rgb(250, 250, 250); border-radius: 5px;">
                        <div class="bgec-topbar-left">
                            <div class="bgec-select-person">
                                <div class="bgec-select-wrapper" style="background-color: rgb(255, 255, 255); border: 1px solid rgb(185, 152, 49); border-radius: 3px;">
                                    <select class="bgec-select" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                        <option></option>
                                        <option value="test-001">Test 001</option>
                                        <option value="test-002">Test 002</option>
                                    </select>
                                </div>
                            </div>
                            <div class="bgec-action-topbar">
                                <a href="#" style="color: rgb(185, 152, 49);">
                                    <svg width="17.004883px" height="16.921997px" viewBox="0 0 17.004883 16.921997" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M10.5741 2.82407L14.0332 6.28322L5.2771 15.0394L1.81988 11.5802L10.5741 2.82407ZM16.6581 1.9898L15.1154 0.447139C14.5192 -0.149046 13.5512 -0.149046 12.953 0.447139L11.4752 1.92485L14.9344 5.38404L16.6581 3.66036C17.1205 3.19793 17.1205 2.4522 16.6581 1.9898ZM0.00962608 16.4423C-0.0533266 16.7256 0.202471 16.9795 0.485822 16.9106L4.3405 15.976L0.883279 12.5168L0.00962608 16.4423Z" fill="currentColor" stroke="none"></path>
                                        </g>
                                    </svg>
                                </a>
                                
                                <a href="#" class="" style="color: rgb(185, 152, 49);">
                                    <svg width="14px" height="17.230774px" viewBox="0 0 14 17.230774" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path d="M12.6538 2.15385L9.69231 2.15385L9.69231 1.61538C9.69231 0.723221 8.96909 0 8.07692 0L5.92308 0C5.03091 0 4.30769 0.723221 4.30769 1.61538L4.30769 2.15385L1.34615 2.15385C0.602707 2.15385 0 2.75655 0 3.5L0 4.57692C0 4.87432 0.241062 5.11538 0.538462 5.11538L13.4615 5.11538C13.7589 5.11538 14 4.87432 14 4.57692L14 3.5C14 2.75655 13.3973 2.15385 12.6538 2.15385ZM5.38462 1.61538C5.38462 1.31856 5.62625 1.07692 5.92308 1.07692L8.07692 1.07692C8.37375 1.07692 8.61539 1.31856 8.61539 1.61538L8.61539 2.15385L5.38462 2.15385L5.38462 1.61538Z" fill="currentColor" stroke="none"></path>
                                            <path d="M1.02187 6.19231C0.925784 6.19231 0.849221 6.27261 0.853798 6.36859L1.29803 15.6921C1.33909 16.555 2.04784 17.2308 2.91139 17.2308L11.0886 17.2308C11.9522 17.2308 12.6609 16.555 12.702 15.6921L13.1462 6.36859C13.1508 6.27261 13.0742 6.19231 12.9781 6.19231L1.02187 6.19231ZM9.15385 7.53846C9.15385 7.24096 9.39481 7 9.69231 7C9.98981 7 10.2308 7.24096 10.2308 7.53846L10.2308 14.5385C10.2308 14.836 9.98981 15.0769 9.69231 15.0769C9.39481 15.0769 9.15385 14.836 9.15385 14.5385L9.15385 7.53846ZM6.46154 7.53846C6.46154 7.24096 6.7025 7 7 7C7.2975 7 7.53846 7.24096 7.53846 7.53846L7.53846 14.5385C7.53846 14.836 7.2975 15.0769 7 15.0769C6.7025 15.0769 6.46154 14.836 6.46154 14.5385L6.46154 7.53846ZM3.76923 7.53846C3.76923 7.24096 4.01019 7 4.30769 7C4.60519 7 4.84615 7.24096 4.84615 7.53846L4.84615 14.5385C4.84615 14.836 4.60519 15.0769 4.30769 15.0769C4.01019 15.0769 3.76923 14.836 3.76923 14.5385L3.76923 7.53846Z" fill="currentColor" stroke="none"></path>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        
                        <div class="bgec-topbar-right">
                            <a href="#" class="bgec-icon-green-btn" style="font-family: Roboto; background-color: rgb(185, 152, 49); color: rgb(255, 255, 255); border: 0px solid rgb(22, 184, 121); border-radius: 10px;">
                                <svg height="17px" version="1.1" viewBox="0 0 17 17" width="17px" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path d="M8.5 0C3.81281 0 0 3.81281 0 8.5C0 13.1872 3.81281 17 8.5 17C13.1872 17 17 13.1865 17 8.5C17 3.81348 13.1872 0 8.5 0ZM8.5 15.6832C4.5397 15.6832 1.3168 12.461 1.3168 8.5C1.3168 4.53903 4.5397 1.3168 8.5 1.3168C12.4603 1.3168 15.6832 4.53903 15.6832 8.5C15.6832 12.461 12.461 15.6832 8.5 15.6832Z" fill="currentColor" stroke="none"></path>
                                        <path d="M11.792 7.78235L9.15842 7.78235L9.15842 5.14874C9.15842 4.78530 8.86411 4.49032 8.5 4.49032C8.13589 4.49032 7.84158 4.78530 7.84158 5.14874L7.84158 7.78235L5.20798 7.78235C4.84387 7.78235 4.54956 8.07732 4.54956 8.44077C4.54956 8.80421 4.84387 9.09918 5.20798 9.09918L7.84158 9.09918L7.84158 11.7328C7.84158 12.0962 8.13589 12.3912 8.5 12.3912C8.86411 12.3912 9.15842 12.0962 9.15842 11.7328L9.15842 9.09918L11.792 9.09918C12.1561 9.09918 12.4504 8.80421 12.4504 8.44077C12.4504 8.07732 12.1561 7.78235 11.792 7.78235Z" fill="currentColor" stroke="none"></path>
                                    </g>
                                </svg> Create new chart
                            </a>&nbsp; 
                            
                            <a href="https://app.bodygraphchart.com/integrate-chart/charts/18454/reports/31321/download?first_name=Test&amp;last_name=001&amp;year=1980&amp;month=03&amp;day=08&amp;hour=12&amp;minute=00&amp;ampm=am&amp;birthplace=Houston%2C+Texas%2C+United+States&amp;timezone=America%2FChicago&amp;latitude=29.76328000&amp;longitude=-95.36327000&amp;pdfDownload=true" class="bgec-icon-transparent-btn" style="font-family: Roboto; background-color: rgb(221, 158, 95); color: rgb(255, 255, 255); border: 0px solid rgb(151, 151, 151); border-radius: 14px;">
                                <svg height="17px" version="1.1" viewBox="0 0 17 17" width="17px" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path d="M17 15.9375C17 16.5243 16.5243 17 15.9375 17L1.0625 17C0.475701 17 0 16.5243 0 15.9375C0 15.3507 0.475701 14.875 1.0625 14.875L15.9375 14.875C16.5243 14.875 17 15.3507 17 15.9375ZM7.74871 12.5716C7.95620 12.7791 8.22807 12.8828 8.5 12.8828C8.77187 12.8828 9.04387 12.7791 9.25129 12.5716L13.0158 8.80716C13.4307 8.39222 13.4307 7.71949 13.0158 7.30455C12.6009 6.88962 11.9281 6.88962 11.5132 7.30455L9.5625 9.25524L9.5625 1.0625C9.5625 0.475701 9.0868 0 8.5 0C7.9132 0 7.4375 0.475701 7.4375 1.0625L7.4375 9.25524L5.48682 7.30455C5.07188 6.88962 4.39915 6.88962 3.98421 7.30455C3.56927 7.71949 3.56927 8.39222 3.98421 8.80716L7.74871 12.5716Z" fill="currentColor" stroke="none"></path>
                                    </g>
                                </svg> Download PDF
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END TOP BAR-->


                <!-- START CHART-->

                <div class="bgec-chart-wrapper bgec-chart-result-wrap bgec-chart-portrait">
                    <div class="bgec-chart-details" chart-data="[object Object]">
                        <div id="chart-view" class="bgec-multiple-charts">
                             <ul>
                                <li>
                                    <div class="bgec-features-list-item purple-box">
                                        <h3>Design</h3>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M10 22.6c4.4 1.3 8.7-1.1 10.9-4.9 2.5-4.2 2.3-9.8-.8-13.6C17.4.9 12.8-.4 8.8.5 4.4 1.5 1.1 5.4.4 9.8c-.8 5.2 2 10.9 7.3 12.3.8.2 1-.9.3-1.2C2.6 18.9.8 13 2.4 7.8 3.9 2.9 9 .5 13.8 1.6c5.4 1.2 8.6 6.5 7.4 11.9-1.1 5.1-5.7 9.3-11.1 8.4-.3 0-.5.6-.1.7h0zm1.4-9.7c.8.2 1.6-.5 1.8-1.2.1-.5 0-1-.2-1.4-.5-.8-1.7-.9-2.4-.3-.6.5-.7 1.3-.4 2 .2.4.5.7.9.8"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                            <p>26.4</p>
                                            <i class="bgec-arrow-icon"><!----></i>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M5.4 20.1c3.1 3.1 7.8 3 11.5.8 3.9-2.3 6.3-6.9 5.5-11.5-.7-4.2-4.2-7.5-8.2-8.6-4.1-1.1-8.5.7-11 4.1-3 4-3.3 10.1.5 13.7.5.5 1.3-.3.8-.8-3.6-4-2.6-9.7 1-13.4C9 .7 14.6 1 18.3 4.3c4 3.7 4 9.7.3 13.7-3.3 3.6-8.8 4.7-12.9 1.7-.2-.2-.6.2-.3.4h0z"></path>
                                                        <path d="M11.9 20.7c.5-6.3.4-12.8.3-19.2 0-.9-1.5-.9-1.5 0 .2 6.4.1 12.8.5 19.2a.35.35 0 0 0 .7 0h0z"></path>
                                                        <path d="M2.7 11.5c6.2.5 12.5.5 18.7.4.9 0 .9-1.5 0-1.5-6.2.2-12.5 0-18.7.4-.3.1-.3.6 0 .7h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                            <p>45.4</p>
                                            <i class="bgec-arrow-icon"><!----></i>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <span style=""><div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M16.4 19.2c.7-1.3 1.6-2.8 3.3-2.4.6.2 1.2.6 1.5 1.2 1 1.9-.5 3.5-2.5 3.4-2.9-.2-3.8-2.9-2.9-5.4.7-1.7 1.9-3.2 2.8-4.8 1.4-2.7 2.1-6 0-8.5-1.7-2-4.5-2.6-7-2.6-1 0-1 1.5 0 1.5 1.9 0 4.5.8 5.8 2.2 2.1 2.5 1.2 5.3-.4 7.7-2.1 3-5 8.5-.1 10.7 1.7.8 3.8.8 5.1-.8.9-1 1.2-2.4.7-3.7-.5-1.4-1.7-2-3.1-1.9-1.9.1-3.1 1.4-3.2 3.3-.1.2 0 .2 0 .1h0z"></path>
                                                    <path d="M6.7 19.2c-.2-1.8-1.4-3.2-3.2-3.3-1.4-.1-2.6.6-3.1 1.9s-.1 2.7.7 3.7c1.3 1.5 3.4 1.5 5.1.8 4.9-2.1 2-7.7-.1-10.7-1.7-2.4-2.6-5.2-.4-7.7 1.2-1.4 3.9-2.3 5.8-2.2 1 0 1-1.5 0-1.5-2.5 0-5.3.5-7 2.5-2.2 2.5-1.5 5.9-.1 8.6.8 1.5 1.9 2.9 2.7 4.5 1.1 2.4.6 5.1-2.3 5.7-2 .4-3.9-1-3-3.1.3-.7.9-1.3 1.6-1.4 1.7-.4 2.6 1.1 3.3 2.4-.1-.1 0-.1 0-.2h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>59.3</p>
                                        <i class="bgec-arrow-icon">
                                            <svg width="9px" height="9px" viewBox="0 0 9 9" version="1.1" xmlns="http://www.w3.org/2000/svg" style="color: rgb(0, 0, 0);">
                                                <g id="Group-3">
                                                    <g id="star">
                                                        <path d="M4.38 0L5.21846 2.36097L7.47639 1.28617L6.40374 3.54862L8.76 4.38875L6.40374 5.22888L7.47639 7.49132L5.21846 6.41653L4.38 8.7775L3.54154 6.41653L1.28361 7.49132L2.35626 5.22888L0 4.38875L2.35626 3.54862L1.28361 1.28617L3.54154 2.36097L4.38 0Z" id="Path" fill="currentColor" stroke="none"></path> 
                                                    </g>
                                                </g>
                                            </svg>
                                        </i>
                                    </div>
                                    
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M6.6 3.8C5.9 5.1 5 6.6 3.3 6.1c-.7-.1-1.2-.6-1.5-1.2-1-1.9.5-3.5 2.5-3.4 2.9.2 3.8 2.9 2.9 5.4-.7 1.7-1.9 3.2-2.8 4.8-1.4 2.7-2.1 6 0 8.5 1.7 2 4.5 2.6 7 2.6 1 0 1-1.5 0-1.5-1.9 0-4.5-.8-5.8-2.2-2.1-2.5-1.2-5.3.4-7.7 2.1-3 5-8.5.1-10.7-1.6-.7-3.7-.7-5 .8-.9 1-1.2 2.4-.7 3.7.5 1.4 1.7 2 3.1 1.9C5.4 7 6.6 5.7 6.8 3.8c0-.1-.2-.1-.2 0h0z"></path>
                                                    <path d="M16.3 3.8c.2 1.8 1.4 3.2 3.2 3.3 1.4.1 2.6-.6 3.1-1.9s.1-2.7-.7-3.7C20.6 0 18.5 0 16.8.7c-4.9 2.1-2 7.7.1 10.7 1.7 2.4 2.6 5.2.4 7.7-1.2 1.4-3.9 2.3-5.8 2.2-1 0-1 1.5 0 1.5 2.5 0 5.3-.5 7-2.5 2.2-2.5 1.5-5.9.1-8.6-.8-1.5-1.9-2.9-2.7-4.5-1.1-2.4-.6-5.1 2.3-5.7 2-.4 3.9 1 3 3.1-.3.7-.9 1.3-1.6 1.4-1.7.4-2.6-1.1-3.3-2.4.1.1 0 .1 0 .2h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>55.3</p>
                                        <i class="bgec-arrow-icon"><!----></i>
                                    </div>
                
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23">
                                                    <path d="m2.8,1.89999c4.7,1.2,9.2,4.8,9.1,10.1,0,2.1-.7,4.1-2.2,5.7-1.6,1.6-3.5,2.2-5.5,2.9-.2.1-.2.3,0,.3,5,.1,8.7-4.1,8.8-8.9C13,6.79999,8.3,1.09999,2.8,1.39999c-.2,0-.3.4,0,.5h0Z" style="fill: currentColor;"></path>
                                                    <path d="m2.9,1.89999c6.4-2.3,15.9.9,16,8.7.1,4.3-2.3,7.7-6.1,9.5-3.2,1.5-6.6,1.6-10,1.6-.2,0-.2.3,0,.3,5.5,1.8,13.3-.7,16-5.9,1.6-3,1.7-6.9.2-9.9-1.4-2.8-4.2-4.5-7.1-5.3C9-.00001,5.4-.10001,2.7,1.49999c-.2.1-.1.5.2.4h0Z" style="fill: currentColor;"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>46.2</p>
                                        <i class="bgec-arrow-icon"><!----></i>
                                    </div>
                                    
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M4.8.5c.9 1.8 3.4 2.4 5.2 2.6 2.6.3 5.6.1 7.6-1.9.6-.5-.1-1.3-.8-1-1 .4-1.9 1.2-3 1.5-1.2.4-2.6.4-3.9.4-1-.1-2-.3-3-.8-.7-.3-1.3-.8-2-1-.1 0-.2.1-.1.2h0zm6.4 22c.2-1.2.2-2.5.3-3.8s.2-2.6 0-3.9c-.1-.5-1-.5-1 0-.2 1.3-.1 2.6 0 3.9 0 1.3 0 2.5.2 3.8.1.3.5.3.5 0h0z"></path>
                                                    <path d="M8 19.3c1 .2 2 .2 3 .2s2 .1 3-.1c.3-.1.3-.6 0-.6-1-.1-2-.1-3 0-1 0-2 0-3 .3-.1-.1-.1.2 0 .2h0zm-.7-5.4c2.4 2.6 6.3 2 8.7-.4 2.6-2.7 2.5-6.9-.2-9.4-2.5-2.3-6.2-2.5-8.9-.3-2.8 2.1-3.3 6.7-.6 9.2.5.5 1.2-.2.8-.8-1.9-2.4-1.5-5.5.7-7.6 2.1-2 5.3-1.6 7.3.4C20 9.8 13 17.1 7.7 13.4c-.3-.2-.6.2-.4.5h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>14.6</p>
                                        <i class="bgec-arrow-icon"><!----></i>
                                    </div>
                                    
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M11.9 22.6c.2-1.3.2-2.5.3-3.8.1-1.4.3-2.8.1-4.2-.1-.5-1-.8-1.1-.1-.2 1.4-.1 2.8 0 4.1l.2 4.1c.1.1.5.1.5-.1h0z"></path>
                                                    <path d="M8.7 19.1c1 .2 2 .2 3 .2s2 .1 3-.1c.3-.1.3-.6 0-.6-1-.1-2-.1-3 0-1 0-2 0-3 .3-.2-.1-.2.2 0 .2h0zm-1.4-5.9c2.6 2.8 7 2.1 9.6-.5 2.8-2.8 2.8-7.3 0-10.2-2.8-2.7-7-3-10.1-.5-3 2.5-3.5 7.5-.6 10.2.5.6 1.2-.2.8-.7-2.3-2.8-1.6-6.4.9-8.7 2.4-2.3 6.3-1.5 8.4.8 5.1 5.5-2.8 13.3-8.6 9.2-.3-.2-.6.2-.4.4h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>54.3</p>
                                        <i class="bgec-arrow-icon">
                                            <svg width="9px" height="9px" viewBox="0 0 9 9" version="1.1" xmlns="http://www.w3.org/2000/svg" style="color: rgb(0, 0, 0);">
                                                <g id="Group-3">
                                                    <g id="star">
                                                        <path d="M4.38 0L5.21846 2.36097L7.47639 1.28617L6.40374 3.54862L8.76 4.38875L6.40374 5.22888L7.47639 7.49132L5.21846 6.41653L4.38 8.7775L3.54154 6.41653L1.28361 7.49132L2.35626 5.22888L0 4.38875L2.35626 3.54862L1.28361 1.28617L3.54154 2.36097L4.38 0Z" id="Path" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </g>
                                            </svg>
                                        </i>
                                    </div>
                                    
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M20.7 1l-4 3.9c-1.2 1.2-2.6 2.4-3.5 3.8-.3.5.3.9.7.6 1.4-1.1 2.5-2.6 3.6-4L21 1.4c.3-.3-.1-.6-.3-.4h0z"></path>
                                                    <path d="M20.7.9c-.6.4-.7 1.3-.9 1.9-.3.8-.9 2.2-.4 3a.57.57 0 0 0 1 0c.4-.8.3-1.9.5-2.7.1-.6.4-1.3.3-1.9 0-.2-.3-.4-.5-.3h0z"></path>
                                                    <path d="M20.9.9c-.6-.1-1.5.3-2.2.4l-2.3.3c-.5.1-.5.9 0 1 .8.2 1.8 0 2.6-.2.6-.1 1.9-.3 2.1-1.1.1-.1 0-.4-.2-.4h0zM5.5 20.5c2.6 2.8 7.1 2.1 9.6-.5 2.8-2.8 2.8-7.4 0-10.2S8 6.7 4.9 9.3c-3 2.5-3.5 7.5-.6 10.3.5.5 1.2-.2.8-.8-2.3-2.8-1.6-6.4 1-8.7 2.4-2.3 6.3-1.5 8.4.8 5.1 5.5-2.8 13.4-8.6 9.2-.4-.3-.7.2-.4.4h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>40.4</p>
                                        <i class="bgec-arrow-icon">
                                            <svg width="8px" height="8px" viewBox="0 0 8 8" version="1.1" xmlns="http://www.w3.org/2000/svg" style="color: rgb(0, 0, 0);">
                                                <g id="Group-4">
                                                    <path d="M6.98532 3.24264L3.74268 7.48528L0.500035 3.24264L6.98532 3.24264Z" id="Rectangle" fill="currentColor" fill-rule="evenodd" stroke="none"></path>
                                                </g>
                                            </svg>
                                        </i>
                                    </div>
                                    
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M19 14.1c-2.5-.3-4.9-.3-7.4-.4-1.3 0-2.7-.1-4-.1-.9 0-1.9-.2-2.8.2-.5.2-.3 1 .1 1.1.8.3 2 .1 2.8.1l4.1-.1 7.2-.3c.4.1.4-.4 0-.5h0z"></path>
                                                    <path d="M14.8 22.6c.3-2 .3-4 .5-6 .1-1.1.1-2.3.1-3.4 0-.8.2-1.6-.1-2.3-.2-.4-.9-.4-1.1 0-.3.6-.2 1.3-.2 2.1v3.4l.2 6.2c0 .2.5.4.6 0h0zm-9.7-8.3c4.7 0 10.8-5.5 9.1-10.5C12.8 0 7-1 4.9 2.7c-.2.3.2.6.5.4 2.6-2.5 7.2-2 7.7 2.1.5 4.4-4.7 7.2-8.1 8.7-.3.1-.2.4.1.4h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>40.5</p>
                                        <i class="bgec-arrow-icon"><!----></i>
                                    </div>
                
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M7.9.5c0-.3-.4-.3-.5 0-.5 3.9-.4 16.6-.4 19 0 .8.6.9.7 0 0-.1.7-15.1.2-19z"></path>
                                                    <path d="M4.2 5.5c1.1.2 2.2.2 3.4.2 1.1 0 2.3.1 3.4-.1.4-.1.2-.6-.1-.6-1.2-.1-2.4 0-3.6 0-1 0-2.1 0-3.1.3 0 0-.1.1 0 .2h0zm3.5 6.4c1.3-2.1 4-3.4 6.4-2.3 3.3 1.5.9 5.5-.3 7.6-.9 1.6-1.5 3.1 0 4.6 1.7 1.7 3.8.9 4.8-1.1.2-.3-.3-.7-.5-.4-.7.8-1.5 1.8-2.7 1.3-.5-.2-1.1-.7-1.3-1.3-.3-1.2.9-2.5 1.5-3.4 1.2-2 2.4-4.8.9-7-2.1-3.3-8.6-2.2-9.2 1.8-.1.3.2.5.4.2h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>6.5</p>
                                        <i class="bgec-arrow-icon"><!----></i>
                                    </div>
                
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M11.8 16.2c.6-4.8.6-9.8.5-14.6 0-1-1.6-1-1.5 0 .2 4.8 0 9.8.4 14.6 0 .4.5.4.6 0h0zM1.2.7c3.5 1.8 6.4 4.4 6.5 8.6.1 4.3-2.9 7.4-6.7 8.8-.3.1-.3.7.1.7 4.5-.5 8-4.9 8.1-9.3C9.3 5.2 5.9.3 1.4.2c-.3 0-.4.4-.2.5h0zM21.6.2c-4.5.2-7.9 5.1-7.8 9.3.1 4.4 3.6 8.8 8.1 9.3.4 0 .4-.6.1-.7-3.8-1.4-6.8-4.5-6.7-8.8.1-4.2 3-6.9 6.5-8.6.2-.1.1-.5-.2-.5h0z"></path>
                                                    <path d="M5.1 9c3.6 2.3 10 2.7 13.2-.4.4-.3 0-1-.5-.9-2.1.7-3.9 1.6-6.1 1.7s-4.2-.5-6.4-1c-.3-.1-.5.4-.2.6h0zm4.8 13.1c1 1.2 2.7.9 3.7-.1 1.1-1.2 1.1-3-.1-4.1-2.3-2.1-6 .3-4.7 3.2.2.4.8.1.7-.3-.2-1-.1-1.8.7-2.4.7-.6 1.6-.7 2.4-.2a1.97 1.97 0 0 1 .6 3c-.7 1-2 1.1-3.1.6-.1-.2-.3.1-.2.3h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>43.5</p>
                                        <i class="bgec-arrow-icon"><!----></i>
                                    </div>
                
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M10.9.9c-.4 3.7-.2 7.6-.2 11.3l.1 10c0 .8 1.3.8 1.3 0-.3-7 .2-14.2-.6-21.3 0-.4-.6-.4-.6 0h0z"></path>
                                                    <path d="M4 5.8c0 2.5.4 5 2.1 7 1.3 1.5 3.5 3 5.6 2.6.6-.1.5-1 0-1.1-2.1-.6-3.8-.9-5.1-2.8C5.4 9.8 5 7.7 4.7 5.7c-.1-.4-.7-.3-.7.1h0z"></path>
                                                    <path d="M2.9 7.9c.5.1.9-.4 1.1-.8.3-.4.5-1 .6-1.5 0-.3-.5-.5-.6-.2-.3.5-.4.9-.6 1.4-.2.3-.6.6-.6 1 0 .1.1.1.1.1h0z"></path>
                                                    <path d="M6.2 7.1c-.3-.4-.7-.7-1-1.1-.2-.2-.5-.5-.8-.6-.1-.1-.4 0-.3.2.1.4.5.7.7 1 .3.3.8.8 1.4.7.1 0 .1-.1 0-.2h0zm12.1-1.4c-.3 2.1-.8 4.4-2.1 6.1-1.4 1.7-3.1 2-5 2.5-.5.1-.6 1 0 1.1 2 .4 4.3-1 5.6-2.5 1.7-2 2.2-4.6 2.2-7.2 0-.3-.6-.4-.7 0h0z"></path><path d="M20.2 7.8c0-.4-.4-.7-.6-1.1L19 5.4c-.2-.3-.7-.2-.6.2.1.5.3 1.1.6 1.5.2.4.6.9 1.1.8 0 0 .1 0 .1-.1h0z"></path>
                                                    <path d="M16.8 7c.3.2.7 0 1-.2.4-.3.9-.7 1.1-1.1 0-.2-.1-.4-.3-.3-.4.1-.7.5-1 .8-.3.2-.5.4-.7.6-.1 0-.1.1-.1.2h0zM11.2.1c-.5 0-.8.6-1.1 1s-.8.8-1.1 1.3a.22.22 0 0 0 .3.3c.6-.1 1-.7 1.3-1.1.3-.3.8-.9.7-1.4.1 0 0-.1-.1-.1h0z"></path>
                                                    <path d="M11.1.3c-.2.5.4 1.1.6 1.4.3.4.8 1 1.4 1.1.2 0 .4-.2.3-.4-.2-.5-.8-.9-1.1-1.3-.3-.3-.6-.9-1-.9-.1-.1-.2 0-.2.1h0zM7.6 18.8c2.5.2 5.3.4 7.7.2.6-.1.8-.9.1-1.1-2.5-.4-5.5-.2-8 .2-.3.1-.1.7.2.7h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>26.4</p>
                                        <i class="bgec-arrow-icon"><!----></i>
                                    </div>
                
                                    <div class="bgec-single-feature-item" style="background: rgb(220, 203, 148); border-radius: 10px; color: rgb(0, 0, 0);">
                                        <span style="">
                                            <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                    <path d="M2.9 8.8c0 4.4 4 7.8 8.3 8 .9 0 .9-1.4 0-1.5-4.1-.3-6.7-2.8-7.9-6.5-.1-.2-.4-.2-.4 0h0z"></path>
                                                    <path d="M19.4 8.8c-1.3 3.8-3.8 6.3-7.9 6.6-.9.1-.9 1.5 0 1.5 4.2-.2 8.2-3.6 8.3-8-.1-.3-.4-.3-.4-.1h0zm-12 3.6c2.5 2.7 6.7 2 9.1-.4 2.7-2.7 2.7-7.1-.1-9.7-2.7-2.6-6.6-2.8-9.5-.5-3 2.3-3.4 7.2-.6 9.8.5.5 1.3-.2.8-.8-2-2.5-1.5-5.9.8-8 2.3-2.2 5.8-1.7 7.9.5 4.9 5.1-2.5 12.6-8 8.7-.4-.2-.7.2-.4.4h0z"></path>
                                                    <path d="M11.6 22.7c.2-1.3.2-2.7.3-4l.1-4.6c-.1-.5-1-.8-1.1-.1-.2 1.5 0 3 0 4.4.1 1.5 0 2.9.3 4.4 0 .1.4.1.4-.1h0z"></path>
                                                    <path d="M8.7 18.9c.9.2 1.8.2 2.7.2s1.8.1 2.7-.1c.3-.1.3-.6 0-.6-.9-.1-1.8-.1-2.7 0-.9 0-1.8 0-2.7.3-.2-.1-.2.2 0 .2h0z"></path>
                                                </svg>
                                            </div>
                                        </span>
                                        <p>32.1</p>
                                        <i class="bgec-arrow-icon"><!----></i>
                                        </div><!----><!---->
                                    </div>
                                </li>
                
                                <li class="bgec-type-traditional-container">
                                    <div class="bgec-chart-container">
                                        <div class="bgec-image-frame-wrapper">
                                            <div class="bgec-stats-boxes">
                                                <div class="bgec-left-boxes bgec-common-boxes"><div>
                                                    <span class="bgec-reverse arrow-icon" style="color: rgb(220, 203, 148);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21">
                                                            <path stroke="currentColor" fill="currentColor" d="M.432 2.561C.008 2.133-.12 1.492.108.934S.875.009 1.478 0h6.169c.393 0 .77.159 1.046.44l8.872 9c.577.589.577 1.532 0 2.121l-8.872 9c-.276.281-.652.439-1.046.44H1.478c-.603-.009-1.142-.376-1.37-.934s-.1-1.198.324-1.626l6.78-6.879c.577-.589.577-1.532 0-2.121L.432 2.561z"></path>
                                                        </svg>
                                                    </span>
                                                    <span style="color: rgb(220, 203, 148);">1
                                                        <sub>1</sub>
                                                    </span>
                                                </div>
                                                <div>
                                                    <span class="bgec-reverse arrow-icon" style="color: rgb(220, 203, 148);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21">
                                                            <path stroke="currentColor" fill="currentColor" d="M.432 2.561C.008 2.133-.12 1.492.108.934S.875.009 1.478 0h6.169c.393 0 .77.159 1.046.44l8.872 9c.577.589.577 1.532 0 2.121l-8.872 9c-.276.281-.652.439-1.046.44H1.478c-.603-.009-1.142-.376-1.37-.934s-.1-1.198.324-1.626l6.78-6.879c.577-.589.577-1.532 0-2.121L.432 2.561z"></path>
                                                        </svg>
                                                    </span>
                                                    <span style="color: rgb(220, 203, 148);">3
                                                        <sub>2</sub>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="bgec-right-boxes bgec-common-boxes">
                                                <div>
                                                    <span class="bgec-reverse arrow-icon" style="color: rgb(140, 115, 44);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21">
                                                            <path stroke="currentColor" fill="currentColor" d="M.432 2.561C.008 2.133-.12 1.492.108.934S.875.009 1.478 0h6.169c.393 0 .77.159 1.046.44l8.872 9c.577.589.577 1.532 0 2.121l-8.872 9c-.276.281-.652.439-1.046.44H1.478c-.603-.009-1.142-.376-1.37-.934s-.1-1.198.324-1.626l6.78-6.879c.577-.589.577-1.532 0-2.121L.432 2.561z"></path>
                                                        </svg>
                                                    </span>
                                                    <span style="color: rgb(140, 115, 44);">
                                                        <sub>2</sub>6
                                                    </span>
                                                </div>
                
                                                <div>
                                                    <span class="arrow-icon" style="color: rgb(140, 115, 44);">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="21">
                                                            <path stroke="currentColor" fill="currentColor" d="M.432 2.561C.008 2.133-.12 1.492.108.934S.875.009 1.478 0h6.169c.393 0 .77.159 1.046.44l8.872 9c.577.589.577 1.532 0 2.121l-8.872 9c-.276.281-.652.439-1.046.44H1.478c-.603-.009-1.142-.376-1.37-.934s-.1-1.198.324-1.626l6.78-6.879c.577-.589.577-1.532 0-2.121L.432 2.561z"></path>
                                                        </svg>
                                                    </span>
                                                    <span style="color: rgb(140, 115, 44);">
                                                        <sub>4</sub>6
                                                    </span>
                                                </div>
                                            </div>
                
                                        </div>
                                        <figure>
                                                    <div class="bgec-img-fluid bgec-type-traditional"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 693">
                                            <g id="bg"><path transform="translate(-44, 0)" d="M247.743 67.428l1.058.006 3.176.141 3.178.14 1.59.071.529.034 1.058.099h0l3.174.294h0l3.176.293.795.073 2.372.336 3.165.448 1.054.15 2.111.312h0l3.143.602 4.721.903.522.115 1.04.252h0l3.117.756h0l3.121.757.779.192.771.228 1.541.454 3.082.91 2.058.606h0l1.023.319 3.039 1.061 3.04 1.063 1.519.53.502.19.995.405h0l2.986 1.212h0l2.987 1.213.746.303.733.338 1.462.68 2.925 1.362 2.925 1.366 2.854 1.507 2.856 1.508.571.303 2.262 1.249h0l5.555 3.3.463.276.921.56h0l1.346.894 2.693 1.79 2.691 1.79.448.299.87.635h0l1.299.962 5.2 3.851 4.987 4.098 1.247 1.026.417.341.81.709h0l2.391 2.177 2.39 2.178 1.196 1.088.387.374.759.765h0l4.548 4.584.457.457 1.735 1.913h0l2.156 2.402 2.154 2.401 2.034 2.502 2.029 2.505 1.014 1.252.505.628.475.65 3.8 5.2.316.433.623.872h0l.882 1.344 1.767 2.688 1.765 2.687.557.914 1.085 1.846h0l1.628 2.766.814 1.383.407.691.374.708 1.488 2.839h0l1.487 2.838.549 1.046h0l.095.187h0l.09.189.673 1.452 1.198 2.587 1.787-.098.333-.005-.217-.271-.588-.761-1.992-2.828-1.266-2.128-.321-.626-.108-.223.211.137.576.403 1.939 1.538 2.539 2.352.674.683.236.248.051-.326.538-2.577.568-1.81.205-.504.078-.177.058.186.133.528c.104.451.227 1.099.322 1.867s.166 1.669.189 2.626l.004.331.269-.217.76-.585 2.831-1.991 2.127-1.267.624-.322.226-.104-.137.205-.403.578-1.539 1.937-2.351 2.541-.683.674-.246.233.323.049 2.577.536 1.81.576.503.202.178.081-.187.058-.526.132c-.453.108-1.099.23-1.871.325a25.43 25.43 0 0 1-2.623.187l-.325.009.213.266.588.758 1.991 2.828 1.265 2.128.32.626.108.227-.209-.139-.577-.401-1.941-1.536-2.537-2.352-.674-.685-.232-.246-.049.321-.538 2.575-.572 1.809-.202.504-.081.177-.056-.186-.135-.526c-.106-.456-.228-1.098-.324-1.869s-.166-1.666-.189-2.626l-.005-.323-.264.213-.76.588-.291.22.573 1.415h0l1.2 2.957.599 1.477.299.739.264.752 1.053 3.006h0l1.052 3.002.175.5.336 1.005h0l.453 1.523.905 3.044.903 3.041.262 1.023.503 2.051h0l.756 3.074.148.615.565 2.464h0l.606 3.099h0l.604 3.095.153.773.361 2.334h0l.456 3.113.455 3.109.113 1.04.203 2.082h0l.305 3.118.152 1.557.075.779.04.781.155 3.12h0l.155 3.116.037 1.312c.399 16.172-1.368 32.209-5.25 47.462h0l-.36 1.47h0l-.359 1.469-.43 1.449h0l-.429 1.447-.431 1.445-1.304 4.322h0l-.448 1.257c-1.182 3.356-2.288 6.725-3.697 9.964h0l-.55 1.383c-2.792 6.892-6.169 13.46-9.718 19.828h0l-.666 1.112c-1.768 2.967-3.486 5.946-5.449 8.752h0l-.801 1.199h0l-.8 1.198-.798 1.196-.398.595-.429.577-1.709 2.3h0l-1.704 2.293-.567.763-1.143 1.517h0l-.903 1.096h0l-.901 1.094-1.799 2.182h0l-1.793 2.176-1.253 1.396-2.522 2.762h0l-.629.689c-1.045 1.149-2.082 2.302-3.204 3.364h0l-1.972 1.953h0l-1.966 1.946-.98.97-1.026.919-1.024.916h0l-1.022.915-1.02.914h0l-1.018.912-.51.455c-.507.458-1.009.918-1.548 1.334h0l-2.112 1.707h0l-2.104 1.702-.7.566-1.401 1.122h0l-1.086.791h0l-1.084.79-2.161 1.578h0l-2.153 1.57-1.098.747-3.316 2.178h0l-1.103.725h0l-1.099.722-.365.24c-.243.161-.486.322-.735.472h0l-1.129.664-1.194.718a179.65 179.65 0 0 1-35.368 16.179h0l-.571.201c-.575.189-1.159.347-1.735.523h0l-1.155.345h0l-1.153.343-1.148.341-3.433 1.004h0l-2.298.566h0l-2.286.564-.912.222c-1.212.303-2.416.621-3.636.833h0l-1.513.308c-5.542 1.11-11.008 1.99-16.382 2.545h0l-1.3.136c-11.252 1.131-22.037 1.125-32.116.305h0l-1.253-.107c-9.994-.885-19.292-2.522-27.731-4.736h0l-.945-.221c-1.879-.464-3.691-1.048-5.485-1.565h0l-.892-.262c-1.78-.521-3.529-1.028-5.203-1.653h0l-1.465-.512-4.294-1.501h0l-1.1-.438-4.28-1.735h0l-.771-.32c-13.553-5.658-23.45-11.769-29.983-16.218h0l-.498-.331-1.873-1.245h0l-.436-.297c-.567-.399-1.081-.805-1.58-1.165h0l-.405-.3-2.709-2.006h0l-.211-.156-1.723-1.275-.088-.065.088.065 1.723 1.273.211.156.287.212 2.829 2.092h0l.379.276c.51.378 1.043.791 1.64 1.182h0l.451.3 1.923 1.275h0l.374.253c6.665 4.503 16.696 10.628 30.39 16.254h0l1.053.426 4.327 1.742h0l1.415.492 4.345 1.513h0l.843.303c1.698.588 3.463 1.079 5.252 1.609h0l.898.261c1.801.531 3.628 1.099 5.532 1.515h0l1.059.273c8.507 2.158 17.87 3.731 27.915 4.542h0l1.165.09a177.34 177.34 0 0 0 32.23-.559h0l1.467-.161c5.387-.618 10.862-1.552 16.413-2.708h0l.76-.145c1.264-.262 2.515-.613 3.784-.913h0l2.283-.565h0l2.297-.568 1.142-.323 3.434-1.026h0l1.15-.343h0l1.153-.344.578-.174c.579-.171 1.16-.339 1.728-.552h0l1.227-.413c11.859-4.042 23.769-9.506 35.282-16.502h0l1.128-.665.369-.232.729-.481h0l1.097-.722h0l1.099-.723 1.101-.726 3.307-2.201h0l2.148-1.57h0l2.157-1.577 1.082-.79h0l1.084-.792.703-.557h0l1.395-1.132 2.1-1.701h0l2.108-1.709.527-.429c.518-.44 1.013-.909 1.526-1.358h0l1.016-.912h0l1.019-.913 1.019-.915h0l1.022-.916 1.024-.918.979-.969 1.96-1.946h0l1.967-1.952.662-.648c1.089-1.095 2.112-2.257 3.161-3.401h0l1.256-1.378 2.509-2.775h0l1.791-2.177h0l1.797-2.184.901-1.094h0l.903-1.096.573-.75 1.13-1.523h0l1.698-2.291h0l1.704-2.298.426-.576.398-.598.795-1.193.797-1.197h0l.799-1.199.723-1.059c1.9-2.843 3.593-5.837 5.373-8.796h0l.705-1.275c3.512-6.387 6.827-12.983 9.529-19.91h0l.513-1.219c1.334-3.265 2.412-6.642 3.613-9.986h0l.445-1.434 1.283-4.325h0l.427-1.445h0l.427-1.446.357-1.467h0l.357-1.469.309-1.236c3.749-15.268 5.381-31.302 4.852-47.448h0l-.157-3.109h0l-.158-3.114-.041-.78-.077-.777-.153-1.554-.307-3.112-.102-1.039-.215-2.077h0l-.458-3.102-.457-3.105-.113-.778c-.114-.777-.237-1.553-.404-2.322h0l-.606-3.088h0l-.607-3.091-.12-.619c-.175-.822-.405-1.634-.595-2.453h0l-.756-3.067-.252-1.022-.514-2.044h0l-.905-3.032-.905-3.037-.454-1.519-.159-.504-.351-.996h0l-1.053-2.996h0l-1.053-2.997-.264-.751-.298-.736-.599-1.474-1.199-2.948-.401-.984-.135-.335c-.776.57-1.518 1.08-2.191 1.515-.856.55-1.596.979-2.127 1.262-.264.143-.482.245-.626.32l-.227.11s.046-.075.137-.212.223-.336.402-.577c.354-.488.875-1.164 1.537-1.94.637-.747 1.404-1.584 2.258-2.447l-.599-1.29a25.71 25.71 0 0 1-1.275-.3 19.45 19.45 0 0 1-1.811-.568c-.217-.082-.388-.156-.506-.203s-.176-.081-.176-.081.066-.023.186-.055.3-.082.528-.136c.453-.104 1.098-.224 1.869-.32l.392-.047-1.137-2.446-.672-1.447-.237-.477h0l-.495-.942-1.487-2.83h0l-1.487-2.832-.374-.706-.406-.689-.814-1.379-1.626-2.758-.542-.919-1.099-1.832h0l-1.763-2.678-1.764-2.68-.883-1.341-.305-.439-.632-.862h0l-3.794-5.182-.476-.649-.504-.626-1.013-1.247-2.026-2.496-2.03-2.494-2.151-2.394-2.152-2.394-.431-.478c-.572-.64-1.137-1.287-1.757-1.882h0l-4.541-4.567-.378-.38-.763-.754h0l-1.192-1.083-2.382-2.165-2.383-2.168-.398-.36c-.27-.235-.548-.461-.827-.688h0l-1.249-1.024-4.99-4.093-5.18-3.828-1.296-.958-.431-.32c-.289-.212-.581-.418-.883-.61h0l-2.687-1.781-2.685-1.783-1.342-.891-.457-.283-.924-.547h0l-5.541-3.285-.553-.331c-.745-.427-1.517-.807-2.273-1.213h0l-2.847-1.5-2.849-1.501-2.916-1.359-2.917-1.355-1.459-.677-.729-.336-.745-.302-2.979-1.207h0l-2.977-1.205-.497-.201c-.33-.136-.661-.273-.998-.391h0l-1.515-.529-3.032-1.055-3.029-1.056-1.021-.316-2.051-.601h0l-3.074-.905-1.536-.452-.768-.225-.778-.19-3.111-.751h0l-3.109-.751-.518-.125c-.345-.085-.69-.171-1.038-.239h0l-1.569-.299-3.137-.597-3.135-.596-1.051-.163-2.104-.295h0l-3.155-.444-1.576-.222-.788-.109-.793-.072-3.167-.291h0l-3.163-.291-.527-.048c-.351-.034-.703-.069-1.055-.082h0l-1.586-.069-3.167-.138-3.165-.138-1.055-.005h0l-2.11.011-3.16.014-.632.005c-.842.001-1.685-.014-2.524.049h0l-3.149.164h0l-3.146.164-.786.039c-.785.051-1.567.135-2.349.215h0l-3.126.312-3.122.313-1.035.142-2.065.307h0l-3.096.459-1.547.228-.772.115-.765.15-3.063.605h0l-3.056.604-1.28.281c-15.765 3.524-30.878 9.109-44.716 16.546h0l-1.34.703h0l-1.337.702-1.299.765h0l-1.298.764-1.297.766-3.872 2.305h0l-2.502 1.646h0l-2.498 1.644-1.246.819-.622.412-.6.44-1.202.878h0l-1.199.877-1.207.866c-6.003 4.363-11.551 9.214-16.863 14.181h0l-.916.912c-2.447 2.425-4.919 4.807-7.159 7.375h0l-.966 1.063h0l-.967 1.06-.964 1.059-.481.528-.455.555-1.82 2.211h0l-1.814 2.204-.603.734-1.188 1.465h0l-.844 1.138h0l-.842 1.137-1.681 2.266h0l-1.675 2.259-1.049 1.548-2.066 3.104h0l-.515.773c-.861 1.287-1.725 2.567-2.482 3.908h0l-1.416 2.377h0l-1.409 2.369-.704 1.181-.642 1.214-.641 1.21h0l-.64 1.209-.639 1.206h0l-.954 1.805c-.321.599-.645 1.197-.918 1.817h0l-1.145 2.454h0l-.478 1.027.052.012c.228.054.405.107.528.136s.186.055.186.055-.062.031-.176.081l-.506.203-.376.135-.372.795-.378.813-.747 1.625h0l-.202.496.648.741c.661.775 1.183 1.452 1.537 1.94.178.241.308.444.402.577l.137.212-.227-.11c-.143-.075-.361-.177-.626-.32-.531-.282-1.271-.712-2.127-1.262l-.371-.243-.182.448-1.006 2.469h0l-1.002 2.458-.456 1.241-1.31 3.731h0l-.434 1.238h0l-.434 1.236-.288.822h0l-.135.414-.369 1.25-.407 1.327a178.44 178.44 0 0 0-7.126 38.072h0l-.056.601c-.044.601-.056 1.204-.089 1.804h0l-.054 1.198h0l-.054 1.195-.053 1.193-.142 3.558h0l.007 2.358h0l.005 2.344.005.778c.002 1.296-.022 2.588.073 3.87h0l.067 1.536c.122 2.609.289 5.191.508 7.741a2.24 2.24 0 0 1 .483-.917c.816-.927 2.228-1.023 3.159-.212a2.24 2.24 0 0 1 .211 3.16c-.812.933-2.225 1.025-3.157.209a2.23 2.23 0 0 1-.561-.751c.231 2.433.512 4.836.851 7.207h0l.183 1.289a176.29 176.29 0 0 0 7.471 31.096h0l.406 1.184c3.272 9.438 7.106 18.025 11.293 25.638h0l.442.86c.903 1.703 1.907 3.311 2.84 4.92h0l.47.798c.936 1.593 1.85 3.16 2.858 4.625h0l.851 1.291 2.492 3.784h0l.69.957 2.717 3.714h0l.487.655c8.758 11.73 17.084 19.817 22.966 25.045h0l.44.401 1.657 1.508h0l.392.349c.523.451 1.045.852 1.515 1.248h0l.39.32 2.605 2.138h0l.206.169 2.238 1.836h0l-.316.385-.318.385-2.442-2.007h0l-.275-.227-2.718-2.233h0l-.36-.3c-.491-.402-1.021-.817-1.547-1.302h0l-.402-.366-1.714-1.559h0l-.455-.414-1.923-1.749h0l-.42-.385c-.709-.644-1.458-1.306-2.172-2.056h0l-.588-.596-5.124-5.194h0l-.592-.66-2.456-2.734h0l-.528-.591-1.075-1.199h0l-.41-.457h0l-.413-.46-.267-.317-.526-.65h0l-.8-.987-2.475-3.052h0l-.564-.698-1.135-1.423h0l-.544-.744-1.103-1.511h0l-.671-.92-2.75-3.779h0l-.823-1.253-2.533-3.853h0l-.499-.745c-.984-1.506-1.892-3.101-2.841-4.712h0l-.474-.809c-.957-1.619-1.955-3.256-2.824-5.004h0l-.523-.962c-4.171-7.74-7.979-16.452-11.213-26.012h0l-.371-1.11a177.25 177.25 0 0 1-7.292-31.443h0l-.2-1.464c-.708-5.383-1.128-10.929-1.352-16.602h0l-.049-.929c-.043-1.24-.011-2.489-.026-3.741h0l-.004-2.355h0l-.005-2.37.037-1.188.164-3.585h0l.055-1.2h0l.055-1.205.029-.603c.026-.604.047-1.209.118-1.812h0l.104-1.292c1.053-12.502 3.483-25.401 7.499-38.287h0l.374-1.256.137-.415.29-.826h0l.437-1.241h0l.437-1.244.439-1.246 1.339-3.748h0l1.008-2.468h0l1.012-2.479.245-.595a48.58 48.58 0 0 1-1.792-1.298c-.254-.188-.505-.389-.76-.588l-.264-.213a7.78 7.78 0 0 1-.005.323 26.55 26.55 0 0 1-.189 2.626c-.097.772-.218 1.413-.324 1.869-.05.228-.105.405-.135.526s-.056.186-.056.186-.03-.06-.081-.177-.124-.286-.202-.504a18.46 18.46 0 0 1-.572-1.809c-.2-.751-.387-1.632-.538-2.575-.018-.105-.033-.212-.049-.321l-.232.246-.674.685a46.96 46.96 0 0 1-2.537 2.352c-.776.658-1.453 1.182-1.941 1.536-.243.177-.445.307-.577.401l-.209.139.108-.227c.073-.146.176-.365.32-.626.286-.53.713-1.273 1.265-2.128a45.17 45.17 0 0 1 1.991-2.828c.188-.256.388-.506.588-.758.068-.091.142-.177.213-.266-.109-.002-.217-.002-.325-.009a25.43 25.43 0 0 1-2.623-.187c-.772-.095-1.418-.217-1.871-.325-.226-.048-.406-.103-.526-.132l-.187-.058s.062-.031.178-.081.285-.125.503-.202c.436-.166 1.057-.376 1.81-.576s1.631-.384 2.577-.536c.107-.018.215-.031.323-.049l-.246-.233-.683-.674a43.38 43.38 0 0 1-2.351-2.541c-.664-.773-1.185-1.449-1.539-1.937-.178-.244-.309-.444-.403-.578-.087-.136-.137-.205-.137-.205s.079.033.226.104.361.177.624.322a29.87 29.87 0 0 1 2.127 1.267 44.28 44.28 0 0 1 2.831 1.991c.254.188.505.387.76.585l.269.217.004-.331c.023-.956.093-1.853.189-2.626s.219-1.416.322-1.867c.05-.228.106-.405.133-.528.035-.122.058-.186.058-.186s.031.062.078.177.125.286.205.504c.163.436.37 1.06.568 1.81s.388 1.631.538 2.577c.02.108.035.214.051.326l.236-.248.674-.683c.894-.893 1.766-1.691 2.539-2.352a32.03 32.03 0 0 1 1.939-1.538c.242-.18.444-.31.576-.403s.211-.137.211-.137l-.108.223c-.075.146-.177.362-.321.626a32.88 32.88 0 0 1-1.266 2.128c-.553.852-1.228 1.824-1.992 2.828-.187.257-.387.504-.588.761l-.217.271c.112 0 .222-.002.333.005.956.022 1.853.09 2.624.188a21.11 21.11 0 0 1 1.025.152l.562-1.204h0l1.152-2.462.29-.617c.303-.611.639-1.206.952-1.813h0l.641-1.209h0l.641-1.212.645-1.213h0l.644-1.215.646-1.218.708-1.185 1.418-2.378h0l1.423-2.387.47-.8c.801-1.323 1.686-2.6 2.547-3.898h0l1.037-1.555 2.094-3.113h0l1.685-2.267h0l1.69-2.276.846-1.139h0l.849-1.143.599-.747 1.209-1.465h0l1.815-2.203h0l1.82-2.207.457-.555.485-.532.97-1.065.974-1.066h0l.975-1.068.856-.961c2.31-2.54 4.814-4.913 7.263-7.36h0l1.071-.995c5.372-4.965 10.993-9.787 17.087-14.097h0l1.205-.88h0l1.206-.88.606-.442.625-.412 1.251-.822 2.508-1.648h0l2.513-1.65 1.288-.781 3.904-2.297h0l1.305-.767h0l1.305-.766 1.343-.704h0l1.345-.704 1.101-.585c13.974-7.361 29.211-12.852 45.083-16.265h0l3.068-.603h0l3.071-.604.77-.15.775-.115 1.552-.229 3.108-.457 1.036-.152 2.076-.295h0l3.134-.311 3.137-.31.785-.08a35.52 35.52 0 0 1 2.362-.174h0l3.156-.161h0l3.16-.162.633-.034c.844-.029 1.69-.005 2.533-.019h0l3.173-.01 1.058-.004 2.117.001zm.076 24.995l.911.005 2.733.121 2.736.12 1.369.061.456.029.911.085h0l2.732.252h0l2.734.252.684.063.681.096 1.361.193 2.724.385.908.128 1.817.268h0l2.705.517 2.709.518 1.354.258.449.099.895.217h0l2.683.65h0l2.686.651.671.165.664.196 1.326.39 2.652.782.885.261 1.766.535h0l2.615.912 2.616.914 1.308.456.432.163h0l.857.348 2.57 1.043h0l2.571 1.043.642.261.631.291 1.259.585 2.517 1.171 2.517 1.175 2.456 1.296 2.458 1.298.491.26c.657.344 1.318.68 1.947 1.074h0l4.78 2.838.399.237c.266.157.533.313.793.482h0l1.158.769 2.317 1.54 2.316 1.54.385.257c.254.176.501.361.749.546h0l1.118.827 1.022.758a34.38 34.38 0 0 1 1.71-.181 41.64 41.64 0 0 1 3.156-.118c.289-.005.581-.003.878.001.103.007.211.007.316.012l-.182-.243c-.512-.708-.957-1.397-1.314-2.011s-.627-1.147-.802-1.531c-.09-.193-.148-.356-.193-.458-.046-.111-.063-.168-.063-.168s.055.029.154.086.251.137.427.252c.361.226.855.564 1.416.999s1.184.968 1.815 1.571l.109.105h0l.107.106.035-.315.112-.869c.155-1.142.346-2.205.542-3.112a28.2 28.2 0 0 1 .554-2.188c.077-.265.152-.47.196-.61l.077-.214.008.036.039.185c.025.145.07.36.113.632a29.09 29.09 0 0 1 .258 2.243 40.59 40.59 0 0 1 .121 3.156c.006.288 0 .581-.006.878 0 .101-.006.207-.008.312.08-.06.16-.122.24-.177.708-.514 1.398-.962 2.009-1.318s1.152-.626 1.537-.8c.193-.089.352-.146.457-.196a4.8 4.8 0 0 1 .159-.058l.007-.002-.029.058c-.013.025-.031.058-.055.099-.059.1-.139.249-.253.426-.223.362-.562.855-.996 1.416s-.97 1.183-1.573 1.814c-.067.073-.135.144-.204.216l.305.033.87.112c1.141.152 2.204.344 3.111.541s1.663.396 2.191.555c.262.078.468.151.611.194l.179.065.036.012-.037.009-.108.024-.079.017c-.147.027-.36.073-.63.112-.546.089-1.32.188-2.245.261s-2.004.119-3.157.121c-.286.004-.58-.002-.875-.007-.101 0-.205-.004-.307-.006.059.077.117.159.173.236.514.707.96 1.396 1.317 2.011s.625 1.147.797 1.536c.09.192.15.352.194.458.036.087.054.141.06.159l.002.007-.026-.013c-.026-.013-.069-.037-.13-.071-.099-.06-.248-.137-.427-.255-.36-.223-.856-.561-1.417-.994a24.6 24.6 0 0 1-1.815-1.574l-.213-.204-.032.307-.11.866a44.15 44.15 0 0 1-.385 2.338l.092.076.358.293c.238.197.472.398.697.61h0l2.057 1.873 2.057 1.873 1.029.936.333.322.653.658h0l3.914 3.944.393.393c.514.533.994 1.098 1.493 1.645h0l1.855 2.066 1.854 2.066 1.75 2.153 1.746 2.155.873 1.077.435.54.409.56 3.269 4.474.272.373c.183.247.366.494.536.751h0l.235.357c.4-.543 1.061-.877 1.783-.829 1.126.076 1.977 1.05 1.902 2.175-.061.919-.726 1.658-1.583 1.854l1.462 2.224.479.786.934 1.588h0l1.401 2.38 1.05 1.785.322.609 1.28 2.443h0l1.28 2.442.472.9h0l.081.161h0l.078.163.579 1.25 1.157 2.498 1.156 2.494.355.844.688 1.697h0l1.033 2.545.515 1.271.257.636.227.647.906 2.587h0l.905 2.583.151.43c.102.286.206.573.289.865h0l.39 1.31.778 2.619.777 2.616.225.88.432 1.765h0l.651 2.645.16.661c.165.66.338 1.318.453 1.988h0l.521 2.667h0l.52 2.663.132.665c.121.667.215 1.338.311 2.008h0l.392 2.678.391 2.675.097.895h0l.175 1.792.262 2.683.131 1.34.065.67.035.672.133 2.685h0l.133 2.681.035 1.261c.328 13.871-1.196 27.624-4.53 40.709h0l-.31 1.265h0l-.309 1.264-.37 1.247h0l-.369 1.245-.494 1.658-1 3.304h0l-.433 1.217c-1 2.843-1.941 5.696-3.136 8.439h0l-.506 1.269c-2.398 5.902-5.294 11.528-8.336 16.984h0l-.645 1.076c-1.497 2.513-2.956 5.035-4.62 7.412h0l-.689 1.032h0l-.688 1.031-.687 1.029-.343.512-.369.496-1.471 1.979h0l-1.467 1.973-.488.657-.984 1.306h0l-.777.943h0l-.776.941-1.549 1.878h0l-1.544 1.872-1.078 1.201-2.171 2.377h0l-.65.711c-.864.95-1.723 1.899-2.651 2.777h0l-1.698 1.681h0l-1.692 1.675-.844.834-.883.791-.881.788h0l-.88.788-.878.786h0l-.876.785-.439.392c-.436.394-.869.79-1.333 1.148h0l-1.818 1.47h0l-1.811 1.465-.603.488-1.206.966h0l-.935.681h0l-.933.68-1.86 1.358h0l-1.853 1.351-.945.643-2.854 1.874h0l-.949.624h0l-.946.621-.314.207c-.209.139-.418.278-.633.406h0l-.972.572-1.102.662a154.71 154.71 0 0 1-30.371 13.884h0l-.492.173c-.495.163-.998.299-1.493.451h0l-.994.297h0l-.992.295-1.317.393-2.626.765h0l-1.978.488h0l-1.967.486-.785.191c-1.044.261-2.079.534-3.13.717h0l-1.421.289c-4.73.945-9.395 1.695-13.982 2.169h0l-1.259.131c-9.634.961-18.87.954-27.503.254h0l-1.172-.1c-8.566-.762-16.537-2.166-23.774-4.062h0l-.948-.224c-1.569-.393-3.085-.88-4.586-1.312h0l-.896-.263c-1.488-.435-2.95-.862-4.35-1.384h0l-1.261-.44-3.695-1.291h0l-1.182-.471-3.449-1.398h0l-.746-.309c-11.622-4.857-20.112-10.098-25.722-13.916h0l-.534-.355-1.507-1.001h0l-.375-.255c-.488-.343-.93-.693-1.36-1.003h0l-.348-.258-2.331-1.725h0l-.198-.147-.995-.736-.133-.099 1.326.98h0l.247.183 2.434 1.8h0l.326.238c.439.325.897.68 1.411 1.017h0l.486.323 1.556 1.031h0l.362.245c5.736 3.871 14.356 9.127 26.114 13.954h0l1.135.459 3.496 1.406h0l1.217.424 3.739 1.301h0l.847.303c1.424.488 2.901.899 4.399 1.341h0l.902.263c1.508.445 3.039.917 4.632 1.265h0l.991.255c7.3 1.846 15.332 3.19 23.947 3.884h0l1.129.086c8.68.632 17.953.558 27.615-.496h0l1.378-.152c4.599-.532 9.274-1.332 14.012-2.319h0l.785-.152c1.044-.222 2.078-.511 3.127-.759h0l1.965-.486h0l1.977-.489 1.311-.374 2.628-.787h0l.99-.296h0l.993-.297.497-.15c.498-.147.998-.291 1.487-.475h0l1.131-.381c10.183-3.477 20.409-8.172 30.295-14.179h0l.971-.572.318-.199.628-.414h0l.945-.621h0l.946-.622.948-.625 2.847-1.894h0l1.849-1.351h0l1.857-1.358.931-.68h0l.933-.681.605-.479 1.201-.975h0l1.808-1.464h0l1.815-1.47.454-.369c.446-.379.872-.782 1.313-1.169h0l.875-.785h0l.877-.786.878-.788h0l.88-.788.881-.79.843-.834 1.687-1.675h0l1.694-1.68.683-.671c.896-.909 1.742-1.869 2.609-2.814h0l1.081-1.186 2.16-2.388h0l1.542-1.873h0l1.547-1.879.775-.942h0l.777-.943.493-.646.972-1.311h0l1.462-1.972h0l1.467-1.978.367-.496.343-.514.685-1.027.686-1.03h0l.687-1.032.699-1.026c1.605-2.412 3.041-4.949 4.55-7.454h0l.647-1.17c3.009-5.474 5.848-11.126 8.164-17.06h0l.495-1.181c1.124-2.769 2.039-5.629 3.058-8.462h0l.507-1.646.981-3.309h0l.367-1.244h0l.368-1.245.308-1.263h0l.308-1.264.297-1.189c3.207-13.101 4.605-26.854 4.153-40.703h0l-.135-2.675h0l-.135-2.679-.035-.671-.066-.668-.132-1.337-.264-2.677-.088-.894-.184-1.787h0l-.394-2.669-.393-2.672-.097-.669a29.87 29.87 0 0 0-.348-1.998h0l-.521-2.657h0l-.522-2.66-.132-.665c-.147-.662-.329-1.317-.483-1.978h0l-.65-2.639-.217-.88-.442-1.759h0l-.778-2.609-.779-2.613-.39-1.307-.137-.433-.302-.857h0l-.906-2.578h0l-.906-2.579-.227-.646-.257-.634-.515-1.268-1.031-2.537-.345-.846-.699-1.688h0l-1.156-2.488-1.158-2.491-.578-1.245-.204-.41-.426-.81h0l-1.279-2.435h0l-1.28-2.436-.322-.607-.349-.593-.701-1.187-1.399-2.373-.467-.791-.945-1.576h0l-1.517-2.304-.047-.071c-.055.001-.11-.001-.166-.004-1.126-.076-1.978-1.05-1.902-2.173.016-.249.077-.484.173-.699l-.337-.511-.262-.377-.544-.742h0l-3.265-4.459-.409-.559-.433-.538-.871-1.073-1.744-2.148-1.747-2.146-1.851-2.059-1.852-2.059-.371-.411c-.492-.551-.978-1.107-1.512-1.619h0l-3.908-3.929-.326-.327-.657-.649h0l-1.026-.932-2.05-1.862-2.051-1.865-.343-.309a28.44 28.44 0 0 0-.712-.592l.082.068-.064.301c-.196.912-.398 1.663-.557 2.193l-.045.15h0l-.044.136-.094.279-.015.044-.064.179-.013.035-.017-.082-.03-.142-.114-.629a30.08 30.08 0 0 1-.259-2.246c-.034-.425-.062-.883-.082-1.365l-2.007-1.646-.267.158a16.57 16.57 0 0 1-1.537.802c-.191.091-.35.148-.456.194l-.166.065.03-.059c.013-.025.032-.058.055-.098.058-.1.139-.249.253-.426.226-.363.564-.856 1-1.416l.054-.069-1.012-.83-2.895-2.139c-.324-.085-.608-.165-.846-.237-.266-.076-.472-.151-.612-.195l-.216-.078s.078-.015.224-.048c.133-.02.32-.06.558-.098l-.671-.498-1.116-.824-.371-.275c-.249-.182-.5-.36-.76-.525h0l-2.312-1.532-2.311-1.533-1.155-.767-.393-.244-.795-.471h0l-4.769-2.826-.476-.284c-.641-.368-1.305-.694-1.956-1.044h0l-2.451-1.291-2.452-1.291-2.509-1.169-2.511-1.166-1.256-.582-.627-.289-.641-.26-2.564-1.038h0l-2.563-1.037-.427-.173c-.284-.117-.569-.234-.859-.336h0l-1.304-.455-2.609-.908-2.607-.908-.878-.272-1.765-.517h0l-2.646-.778-1.983-.582-.669-.164-2.677-.646h0l-2.676-.645-.445-.107c-.297-.073-.594-.147-.894-.206h0l-1.35-.257-2.7-.514-2.698-.513-.904-.14-1.811-.253h0l-2.716-.382-1.356-.191-.678-.094-.683-.062-2.726-.25h0l-2.723-.25-.453-.041c-.302-.029-.605-.06-.908-.07h0l-1.365-.059-2.726-.118-2.724-.118-.908-.004h0l-1.816.009-2.72.012-.68.004c-.68-.001-1.36-.009-2.037.043h0l-2.71.142h0l-2.708.142-.677.034c-.676.044-1.349.116-2.022.186h0l-2.691.269-2.687.27-.891.123-1.777.265h0l-2.665.396-1.331.197-.665.099-.659.129-2.636.521h0l-2.631.521-1.231.271c-13.523 3.037-26.487 7.834-38.361 14.215h0l-1.154.605h0l-1.151.605-1.118.659h0l-1.117.657-1.489.878-2.961 1.765h0l-2.154 1.417h0l-2.15 1.415-1.073.705-.535.354-.517.378-1.035.756h0l-1.032.755-1.108.795c-2.103 1.531-4.142 3.132-6.128 4.78l.072.124a2.28 2.28 0 0 1 .085.157l-.166-.065c-.046-.02-.102-.042-.166-.068a160.34 160.34 0 0 0-4.385 3.786l-.056.385c-.043.267-.09.483-.114.629l-.047.224-.077-.214-.015-.044-.094-.279-.082-.262-3.275 3.003h0l-.887.883c-2.074 2.054-4.166 4.074-6.064 6.249h0l-.832.915h0l-.832.912-.83.911-.414.455-.392.478-1.567 1.902h0l-1.562 1.897-.519.632-1.023 1.261h0l-.727.979h0l-.725.979-1.447 1.95h0l-1.442 1.944-.903 1.332-1.779 2.671h0l-.444.666c-.741 1.107-1.485 2.209-2.137 3.363h0l-1.219 2.045h0l-1.214 2.038-.606 1.016-.553 1.045-.552 1.041h0l-.551 1.04-.55 1.038h0l-.548 1.036-.273.517c-.276.516-.556 1.03-.79 1.564h0l-.986 2.111h0l-.982 2.103-.326.7-.644 1.398h0l-.436 1.068h0l-.434 1.065-.866 2.125h0l-.863 2.115-.52 1.425-1.001 2.854h0l-.374 1.066h0l-.374 1.064-.124.354c-.084.235-.168.471-.241.71h0l-.318 1.075-.375 1.224c-3.326 11.015-5.304 22.023-6.115 32.68h0l-.048.517c-.038.518-.048 1.036-.077 1.552h0l-.047 1.031h0l-.046 1.028-.062 1.368-.107 2.72h0l.005 2.029h0l.004 2.017.004.804c0 1.071-.016 2.138.062 3.196h0l.063 1.442c.227 4.794.628 9.48 1.277 14.025h0l.178 1.247a151.62 151.62 0 0 0 6.405 26.618l-.187-.559c.371-.023.677.241.7.594a.64.64 0 0 1-.299.586l.166.486c2.808 8.086 6.096 15.444 9.686 21.971h0l.446.862c.76 1.42 1.598 2.765 2.379 4.111h0l.472.801c.782 1.331 1.549 2.64 2.392 3.865h0l.732 1.111 2.144 3.255h0l.742 1.028 2.19 2.991h0l.47.632c7.517 10.055 14.662 16.991 19.712 21.479h0l.472.43 1.333 1.212h0l.338.3c.45.388.899.733 1.304 1.074h0l.335.275 2.242 1.839h0l.194.159 1.909 1.566h0l-.272.331-.273.332-.019-.016-2.082-1.711h0l-.237-.195-2.339-1.921h0l-.31-.258c-.423-.346-.879-.703-1.332-1.12h0l-.434-.395-1.387-1.261h0l-.491-.447-1.555-1.415h0l-.435-.398c-.588-.533-1.206-1.082-1.795-1.702h0l-.506-.513-4.41-4.468h0l-.638-.711-1.984-2.209h0l-.454-.508-.925-1.031h0l-.353-.393h0l-.355-.396-.23-.273-.453-.559h0l-.688-.849-2.129-2.626h0l-.485-.6-.977-1.224h0l-.468-.64-.949-1.3h0l-.723-.99-2.221-3.052h0l-.709-1.078-2.179-3.315h0l-.5-.749c-.82-1.264-1.581-2.599-2.375-3.946h0l-.477-.812c-.802-1.355-1.634-2.727-2.361-4.189h0l-.489-.9c-3.574-6.641-6.836-14.113-9.608-22.309l.038.116a.63.63 0 0 1-.057-.167l-.34-1.024a152.45 152.45 0 0 1-6.232-26.935h0l-.187-1.374c-.599-4.595-.956-9.33-1.146-14.171h0l-.042-.799c-.037-1.067-.009-2.141-.022-3.219h0l-.003-2.027h0l-.004-2.039.046-1.364.128-2.743h0l.048-1.033h0l.048-1.037.025-.519c.022-.52.041-1.04.102-1.559h0l.097-1.191c.912-10.733 3.004-21.806 6.454-32.867h0l.322-1.081.118-.357.25-.711h0l.376-1.068h0l.377-1.071.378-1.072 1.153-3.226h0l.868-2.124h0l.872-2.133.438-1.069h0l.438-1.072.32-.704.657-1.404h0l.988-2.111h0l.992-2.119.25-.531c.261-.526.55-1.038.82-1.56h0l.552-1.04h0l.552-1.043.555-1.044h0l.555-1.046.556-1.048.609-1.02 1.221-2.046h0l1.225-2.054.488-.825c.668-1.09 1.398-2.146 2.11-3.218h0l.893-1.339 1.803-2.679h0l1.45-1.951h0l1.455-1.959.729-.981h0l.731-.983.516-.643 1.041-1.261h0l1.563-1.896h0l1.567-1.9.393-.477.418-.457.835-.917.839-.918h0l.84-.919.831-.929c1.962-2.147 4.084-4.158 6.159-6.232h0l.984-.913 2.533-2.304c-.118-.438-.248-.962-.375-1.553a41.71 41.71 0 0 1-.543-3.11c-.043-.285-.073-.574-.11-.866l-.032-.307-.213.204a24.6 24.6 0 0 1-1.815 1.574c-.561.433-1.057.771-1.417.994-.178.117-.328.194-.427.255-.06.035-.104.058-.13.071l-.026.013s.017-.058.062-.166.104-.266.194-.458c.173-.389.442-.924.797-1.536a23.8 23.8 0 0 1 1.317-2.011l.173-.236-.307.006-.875.007c-1.153-.002-2.231-.049-3.157-.121s-1.699-.172-2.245-.261c-.27-.04-.483-.086-.63-.112l-.079-.017-.108-.024-.037-.009s.076-.024.215-.077l.611-.194c.528-.159 1.282-.36 2.191-.555s1.969-.389 3.111-.541c.284-.045.575-.076.87-.112.1-.014.204-.023.305-.033l-.204-.216c-.603-.631-1.138-1.255-1.573-1.814s-.773-1.054-.996-1.416c-.114-.177-.194-.327-.253-.426-.024-.041-.042-.074-.055-.099l-.029-.058s.058.019.166.061c.105.05.265.107.457.196.386.174.923.442 1.537.8s1.301.804 2.009 1.318c.081.055.16.117.24.177l-.008-.312-.006-.878a40.59 40.59 0 0 1 .121-3.156 29.09 29.09 0 0 1 .258-2.243c.043-.272.088-.487.113-.632l.047-.221.077.214c.044.139.119.345.196.61a28.2 28.2 0 0 1 .554 2.188c.196.907.387 1.97.542 3.112.042.284.076.576.112.869.014.104.022.212.035.315.071-.07.143-.143.217-.211a23.98 23.98 0 0 1 1.815-1.571c.561-.435 1.055-.773 1.416-.999.176-.115.328-.194.427-.252l.154-.086s-.017.058-.063.168c-.045.101-.103.264-.193.458-.175.384-.443.919-.802 1.531s-.802 1.304-1.314 2.011c-.058.081-.122.163-.182.243l.316-.012.878-.001a41.64 41.64 0 0 1 3.156.118 29.74 29.74 0 0 1 2.242.259c.273.043.485.089.631.11l.224.048-.216.078c-.141.044-.347.119-.612.195-.525.159-1.28.36-2.186.557s-1.971.384-3.112.54a32.87 32.87 0 0 1-.871.111c-.101.014-.209.023-.313.036.069.074.143.144.212.215a24.71 24.71 0 0 1 1.57 1.817 18.02 18.02 0 0 1 .858 1.195c2.322-1.925 4.716-3.782 7.202-5.54h0l1.037-.757h0l1.038-.757.522-.38.538-.355 1.077-.707 2.159-1.418h0l2.164-1.42 1.481-.893 2.989-1.756h0l1.123-.66h0l1.124-.66 1.156-.606h0l1.158-.606 1.087-.577c11.99-6.299 25.057-11.001 38.667-13.929h0l2.641-.52h0l2.643-.52.663-.129.667-.099 1.336-.198 2.675-.394.892-.131 1.787-.254h0l2.697-.268 2.7-.267.676-.069c.676-.067 1.353-.127 2.033-.15h0l2.716-.139h0l2.72-.14.681-.033c.681-.019 1.363-.001 2.044-.013h0l2.731-.009.911-.004 1.822.001zm155.882 252.044l.36.003a21.79 21.79 0 0 1 21.425 21.782h0l-.006.317h0l-.011.315-.391-.045c-5.477-.567-11.153 1.243-15.35 5.44h0l-.296.302c-4.083 4.267-5.78 9.972-5.1 15.438l-.633.017h0l-.36-.003a21.79 21.79 0 0 1-21.425-21.783h0l.003-.36c.192-11.866 9.871-21.425 21.782-21.425h0zm-318.999 0c11.911 0 21.59 9.559 21.782 21.425l.003.36a21.79 21.79 0 0 1-21.425 21.783l-.36.003c-.213 0-.422-.011-.633-.017.68-5.467-1.016-11.171-5.1-15.438l-.296-.302c-4.197-4.197-9.873-6.007-15.35-5.44l-.391.045-.011-.315h0l-.006-.317a21.79 21.79 0 0 1 21.425-21.782l.36-.003zM243.999 102l.056.809c.038-.005.077-.008.116-.011a2.04 2.04 0 0 1 2.176 1.898c.076 1.128-.775 2.102-1.903 2.177l-.106.002.802 11.551h.218l.751-.003h1.503 0l2.255.099 2.257.099 1.129.05.376.024h0l.751.07 2.254.207h0l2.255.207.564.052.561.079 1.123.159 2.247.317.749.106 1.499.221h0l2.232.426 2.235.426 1.117.213.371.081.738.179h0l2.213.536h0l2.216.536.553.136.548.161 3.282.966.73.215 1.457.44h0l2.157.752 2.158.753 1.079.376.357.134.707.287h0l2.12.859h0l2.121.86.53.215.52.24 1.038.482 2.076.965 2.077.968 2.026 1.068 2.028 1.069.507.268c.508.265 1.018.528 1.504.832h0l3.943 2.339.658.39h0l.325.202.955.634 1.911 1.269 1.91 1.269.318.212a22.63 22.63 0 0 1 .618.45h0l.922.682 3.691 2.731 3.54 2.906.885.727.296.242c.196.162.39.328.575.503h0l1.697 1.544 1.696 1.544.849.772.046.044L343 142l-11.015 11.836 3.172 3.195.403.407c.394.415.766.851 1.152 1.274h0l1.53 1.704 1.529 1.703 1.443 1.775 1.44 1.777.72.888.359.445.337.461 2.696 3.689.224.307c.151.204.302.407.442.619h0l.626.953 1.254 1.907 1.252 1.906.395.648.77 1.309h0l1.155 1.962.577.981.289.49.265.502 1.056 2.014h0l1.055 2.013.389.742h0l.067.133h0l.064.134.478 1.03.954 2.06.953 2.056.293.696.567 1.399h0l.851 2.098.425 1.048.212.524.187.533.747 2.133h0l.746 2.13.124.355c.084.236.169.472.239.713h0l.321 1.081.641 2.16.64 2.157.186.726.356 1.455h0l.536 2.181.132.545c.136.544.278 1.087.373 1.64h0l.429 2.199h0l.428 2.196.108.548c.1.55.177 1.103.256 1.656h0l.323 2.208.322 2.206.08.738.144 1.477h0l.216 2.212.108 1.105.053.553.028.554.109 2.214h0l.109 2.211.032 1.179.03 2.093L386 242.999l-16.623 1.155c-.119 9.893-1.384 19.669-3.772 29.03h0l-.256 1.043h0l-.255 1.043-.306 1.028h0l-.305 1.027-.408 1.368-.826 2.725h0l-.358 1.004c-.826 2.344-1.603 4.697-2.589 6.96h0l-.448 1.121c-1.974 4.841-4.352 9.456-6.85 13.933h0l-.532.888c-1.236 2.073-2.44 4.153-3.813 6.113h0l-.569.851h0l-.568.85-.567.849-.283.423-.305.409-1.214 1.632h0l-1.21 1.627-.403.542-.812 1.077h0l-.641.778h0l-.64.776-1.278 1.549h0l-1.274 1.544-.89.991-1.792 1.96h0l-.536.587c-.713.783-1.422 1.566-2.187 2.29h0l-.676.667L346 345l-14.166-13.192-1.143 1.132-.696.688-.729.652-.727.65h0l-.726.65-.724.649h0l-.723.647-.362.323c-.36.325-.717.652-1.1.947h0l-1.5 1.212h0l-1.495 1.208-.745.603h0l-.748.596-.771.562h0l-.77.561-1.535 1.12h0l-1.529 1.115-1.041.704-2.094 1.373h0l-.783.514h0l-.781.513-.389.256h0l-.393.25-.802.472-1.018.611c-8.157 4.842-16.577 8.614-24.949 11.391h0l-.406.143c-.408.134-.823.247-1.232.372h0l-.82.245h0l-.819.244-1.087.324-2.167.632h0l-1.632.403h0l-1.623.401-.647.158c-.861.215-1.715.441-2.582.592h0l-1.289.262c-3.862.769-7.671 1.38-11.418 1.768h0l-1.133.118c-3.917.389-7.754.584-11.491.612L243.999 385l-1.218-17.525c-2.961-.035-5.854-.173-8.67-.401h0l-1.111-.095c-7.012-.629-13.538-1.78-19.467-3.331h0l-.782-.184c-1.294-.324-2.545-.725-3.783-1.081h0l-.886-.259c-1.177-.344-2.332-.684-3.441-1.097h0l-1.04-.363-3.048-1.063h0l-.975-.388-2.845-1.152h0l-.687-.285c-9.55-3.994-16.53-8.3-21.145-11.44h0l-.44-.293-1.243-.825h0l-.309-.21c-.402-.283-.767-.571-1.121-.826h0l-.323-.239-1.888-1.396h0l-.19-.14-.656-.485-.138-.103.984.726h0l.23.17 1.982 1.464h0l.269.196c.362.268.74.561 1.164.838h0l.401.266 1.284.85h0l.334.226c4.731 3.189 11.83 7.509 21.504 11.477h0l.936.378 2.883 1.159h0l1.004.349 3.084 1.072h0l.84.297c1.131.381 2.301.707 3.487 1.057h0l.744.217c1.244.367 2.507.756 3.821 1.042h0l.941.241c5.989 1.504 12.573 2.6 19.631 3.166h0l1.016.077c2.491.179 5.041.287 7.643.316l-2.22-31.98c-1.113-.05-2.211-.119-3.294-.205h0l-1.027-.088c-5.109-.466-9.868-1.306-14.196-2.436h0l-.693-.165c-.917-.234-1.804-.516-2.683-.768h0l-.655-.191c-.87-.253-1.725-.505-2.545-.81h0l-1.024-.356-2-.696h0l-.959-.382-1.866-.755.646.26L204 342l4.952-13.705c-6.984-2.93-12.095-6.081-15.484-8.382h0l-.326-.216-.919-.609h0l-.284-.195c-.276-.196-.528-.394-.774-.571h0l-.272-.201-1.362-1.007h0l-.168-.124-.302-.223-.134-.1.605.446h0l.195.144 1.44 1.063h0l.249.182c.252.188.516.39.81.582h0l.398.264.848.561h0l.313.211c3.389 2.277 8.401 5.321 15.174 8.155L216.646 307l3.354 1.339-9.73 20.47.278.113.941.38.959.381.992.344 2.032.704h0l.621.219c.836.281 1.702.522 2.579.78h0l.661.192c.884.261 1.783.533 2.716.736h0l.871.221c4.383 1.087 9.194 1.878 14.346 2.288h0l.974.072 2.312.13L239 313h10l-1.557 22.418a93.16 93.16 0 0 0 7.366-.514h0l1.157-.131c2.705-.326 5.453-.802 8.237-1.383h0l.598-.119c.597-.132 1.189-.296 1.789-.438h0l1.199-.298h0l1.207-.299.8-.229 1.604-.481h0l.604-.181h0l.606-.181.405-.122c.271-.08.541-.161.807-.26h0l.967-.328a93.85 93.85 0 0 0 4.007-1.487L269 308.378l3.269-1.378 7.802 21.45a94.82 94.82 0 0 0 12.938-6.56h0l.593-.349.29-.185h0l.288-.19.577-.379h0l.578-.38.772-.508 1.545-1.03h0l1.129-.825h0l1.134-.828.569-.415h0l.57-.416.553-.441h0l.55-.446 1.104-.893h0l1.108-.897.368-.303c.24-.208.472-.426.712-.635h0l.534-.479h0l1.072-.96h0l.537-.481.538-.482.33-.327L293 295.646l3.645-3.646 14.407 15.472.176-.172a42.86 42.86 0 0 0 .997-1.07l.494-.542.66-.723 1.319-1.457h0l.942-1.143h0l.945-1.146.474-.575h0l.475-.575.301-.394.594-.8h0l.893-1.203h0l.896-1.206.224-.302.21-.314.418-.626.419-.628h0l.42-.629.567-.836c.925-1.408 1.763-2.88 2.641-4.336h0l.494-.893c1.534-2.794 2.994-5.664 4.252-8.648L308 271.354l1.338-3.354 21.039 10 .129-.322.345-.823c.668-1.656 1.218-3.364 1.828-5.056h0l.31-1.004.6-2.018h0l.225-.758h0l.225-.759.188-.77h0l.189-.771.236-.949c1.448-5.955 2.283-12.128 2.495-18.379L314 248v-10l23.125 1.606-.051-1.054h0l-.081-1.633-.021-.409-.04-.407-.08-.815-.16-1.632-.079-.817h0l-.086-.817-.239-1.627-.238-1.629-.079-.544c-.054-.362-.113-.723-.191-1.082h0l-.317-1.619h0l-.317-1.621-.08-.406c-.089-.404-.2-.803-.294-1.205h0l-.395-1.608-.197-.805h0l-.203-.804-.474-1.59-.474-1.592-.237-.797-.083-.264-.184-.522h0l-.551-1.571h0l-.552-1.571-.138-.394-.156-.386-.591-1.455L309.38 219l-1.38-3.271 22.039-8.016-.064-.16-.209-.516-.216-.513-.704-1.516-.705-1.518-.352-.758-.189-.374h0l-.195-.37-.779-1.483h0l-.78-1.484-.196-.37-.213-.361-.427-.723-.853-1.446-.568-.964h0l-.292-.478-1.85-2.808-.463-.703-.242-.343h0l-.249-.339-1.99-2.716-.25-.34-.264-.328-.531-.654-1.063-1.308-1.065-1.307-1.128-1.254-1.129-1.254-.282-.313c-.281-.315-.561-.631-.866-.923h0l-2.257-2.267L293.679 195 290 191.321l17.087-15.901-.022-.021-1.251-1.136-.209-.188c-.142-.123-.288-.242-.434-.36h0l-.655-.537-2.619-2.144-2.719-2.005-.68-.502-.226-.167c-.152-.111-.305-.219-.464-.32h0l-1.41-.933-1.41-.933-.705-.467-.361-.22h0l-.364-.215-2.909-1.72-.364-.215c-.368-.207-.748-.394-1.12-.594h0l-1.495-.785-1.496-.786-1.531-.711-1.532-.709-.766-.354-.383-.176-.391-.158-1.564-.631h0l-.752-.303-7.902 21.87-3.354-1.339 10.001-21.038c-.113-.045-.226-.09-.341-.13h0l-.795-.276-1.592-.552-1.59-.552-.536-.165-1.077-.314h0l-1.614-.473-.807-.236-.403-.118-.408-.099-1.634-.392h0l-1.633-.392-.408-.098h0l-.409-.092-.824-.156-1.647-.312-1.646-.311-.552-.085-1.105-.153h0l-1.657-.231-.828-.116-.414-.057-.416-.038-1.663-.151h0l-1.661-.151-.554-.05h0l-.277-.017-.833-.035-1.663-.071-1.558-.067L249 174h-10l1.537-22.132-1.476.08-.55.031c-.366.027-.731.066-1.097.104h0l-1.642.165-1.64.166-.815.116h0l-.813.122-1.627.243-.813.121-.406.061-.402.079-1.609.319h0l-1.606.319-.982.218c-5.312 1.21-10.482 2.864-15.423 4.934L219 178.623 215.728 180l-7.446-20.476a88.96 88.96 0 0 0-6.411 3.119h0l-.704.369h0l-.703.369-.683.402h0l-.682.401-.909.536-1.808 1.078h0l-1.315.865h0l-1.313.863-.655.43-.327.216-.315.231-.632.461h0l-.63.461-.844.608c-3.075 2.252-5.924 4.744-8.656 7.294h0l-.461.456L196 191.282 192.282 195l-13.598-14.766c-.423.44-.837.886-1.237 1.344h0l-.508.558h0l-1.015 1.112-.253.277-.239.291-.957 1.16h0l-.954 1.157-.317.385-.625.769h0l-.444.597h0l-.443.597-.884 1.189h0l-.881 1.186-.552.813-1.087 1.629h0l-.326.487c-.435.648-.869 1.294-1.252 1.97h0l-.745 1.247h0l-.742 1.243-.37.62-.338.637-.337.635h0l-.337.634-.336.633h0l-.335.632-.223.42a12.16 12.16 0 0 0-.427.849h0l-.603 1.288h0l-.601 1.282-.299.639h0l-.294.64-.267.651h0l-.265.649-.269.658L178 215.646 176.66 219l-17.399-8.271-.127.313-.318.869-.612 1.74h0l-.229.65h0l-.229.649-.114.323h0l-.109.325-.195.656-.319 1.045c-1.981 6.616-3.166 13.225-3.659 19.624h0l-.037.42-.041.841h0l-.029.628h0l-.029.627-.038.834-.012.244L175 239v10l-21.82-1.515.025.557c.119 2.407.311 4.768.602 7.072l.154 1.147.154 1.072a92.21 92.21 0 0 0 3.849 15.91h0l.334.968c.399 1.139.815 2.255 1.244 3.346l20.08-9.557 1.377 3.27-20.924 7.611c1.241 3.012 2.591 5.826 4.02 8.424h0l.327.629c.448.827.937 1.614 1.394 2.401h0l.345.585c.457.778.907 1.541 1.401 2.258h0l.594.901 1.159 1.759h0l.603.832 1.184 1.616h0l.413.554c2.434 3.238 4.802 5.94 6.945 8.167L192.279 292l3.721 3.721-15.001 13.815c.866.828 1.674 1.565 2.408 2.217h0l.288.262.813.738h0l.257.227c.257.219.512.415.744.61h0l.262.214 1.31 1.073h0l.164.134 1.119.916h0l-.166.202-.167.202-1.282-1.052h0l-.187-.154-1.384-1.135h0l-.238-.197c-.244-.198-.505-.404-.763-.642h0l-.264-.24-.846-.768h0l-.401-.364-.847-.769h0l-.333-.303c-.338-.306-.69-.622-1.027-.976l.156.157-23.429 21.577c1.379 1.346 2.661 2.53 3.817 3.564l.293.261.389.355 1.099.999h0l.278.247c.372.32.741.604 1.076.885h0l.31.254 1.815 1.488h0l.186.152h0l.34.279 1.209.991h0l-.225.273-.226.274-1.733-1.424h0l-.221-.181-1.904-1.563h0l-.256-.213c-.349-.285-.725-.579-1.098-.923h0l-.358-.325-1.144-1.04h0l-.405-.368-1.283-1.166h0l-.359-.328c-.485-.44-.995-.892-1.481-1.403h0l-.47-.476-.151-.152L149 339l7.081-7.685-2.827-2.869h0l-.526-.586-1.637-1.821h0l-.564-.63h0l-.574-.639-.291-.324h0l-.293-.327-.283-.339h0l-.28-.346-.568-.7-1.756-2.165h0l-.4-.495-.805-1.01h0l-.581-.794h0l-.588-.806-.596-.816-1.831-2.516h0l-.584-.889-1.797-2.733h0l-.493-.743c-.646-1.005-1.249-2.062-1.877-3.128h0l-.393-.669c-.662-1.118-1.348-2.248-1.947-3.454h0l-.488-.9c-2.914-5.436-5.574-11.544-7.836-18.237h0l-.322-.968c-2.235-6.802-4.023-14.214-5.108-22.129h0l-.169-1.247c-.484-3.754-.773-7.62-.927-11.572h0l-.034-.659c-.019-.546-.017-1.094-.015-1.643L103 244l16.684-1.159.001-.364h0l-.003-1.682.038-1.125.106-2.262h0l.04-.852h0l.04-.855.021-.428c.018-.428.034-.858.085-1.286h0l.09-1.1c.76-8.814 2.486-17.905 5.322-26.986h0l.266-.892.149-.441h0l.155-.44.311-.881h0l.311-.883.416-1.18.849-2.364h0l.717-1.752h0l.72-1.76.361-.882h0l.362-.884.264-.58.542-1.158h0l.816-1.741h0l.819-1.747.206-.438c.215-.433.454-.856.676-1.287h0l.456-.858h0l.456-.86.458-.861h0l.458-.863.459-.865.503-.841 1.008-1.688h0l.947-1.586a.64.64 0 0 1 .272-1.199.64.64 0 0 1 .389.102c.495-.791 1.027-1.563 1.547-2.346h0l.737-1.104 1.488-2.21-.671.988a1.2 1.2 0 0 1 .529-2.235 1.2 1.2 0 0 1 .859.283l.48-.645h0l1.201-1.616.601-.809h0l.603-.811.425-.53.859-1.04h0l1.29-1.564h0l1.293-1.567.325-.394.345-.377.689-.756.692-.757h0l.693-.758.685-.766c.799-.874 1.63-1.72 2.472-2.559L149 148l7.506 6.912 2.014-1.99h0l.87-.807c3.783-3.489 7.741-6.877 12.028-9.908h0l.856-.625h0l.857-.625.43-.314.444-.293.889-.583 1.781-1.17h0l1.785-1.171 1.222-.737 2.466-1.449h0l.927-.545h0l.927-.544.954-.5h0l.955-.5.984-.522c9.869-5.174 20.62-9.039 31.815-11.45h0l2.179-.429h0l2.181-.43.547-.107.55-.082 3.309-.489.736-.108 1.474-.21h0l2.225-.221 2.228-.221.557-.057c.557-.056 1.116-.105 1.677-.124h0l2.241-.115h0l2.244-.116.562-.028c.562-.016 1.125-.001 1.686-.011l-.247.001.808-11.641-.144.039a2.04 2.04 0 0 1-.565.041c-1.127-.075-1.979-1.049-1.903-2.177a2.04 2.04 0 0 1 2.176-1.898c.163.011.321.041.471.087a2.01 2.01 0 0 1 .241-.059l.057-.826zm64.546 208.121l-.335.333-.539.482-.538.481h0l-.537.48-.536.48h0l-.535.479-.357.319c-.237.214-.473.426-.725.62h0l-1.11.897h0l-1.106.894-.551.446h0l-.553.441-.571.416h0l-.57.415-1.136.829h0l-1.132.825-.771.521-1.55 1.015h0l-.58.381h0l-.578.379-.288.19h0l-.291.185-.593.349-.942.564c-3.946 2.33-7.974 4.322-12.02 5.993L285 342l-6.165-12.955a93.68 93.68 0 0 1-4.988 1.814h0l-.401.138c-.269.085-.542.161-.811.243h0l-.607.181h0l-.606.181-.804.24-1.603.468h0l-1.207.298h0l-1.201.297-.598.147c-.597.15-1.19.304-1.791.409h0l-1.192.242c-2.776.548-5.515.984-8.21 1.265h0l-1.084.112a93.25 93.25 0 0 1-6.293.396l-2.218 31.929a125.87 125.87 0 0 0 12.609-.74h0l1.25-.139c3.758-.44 7.576-1.096 11.446-1.902h0l.647-.126c.861-.183 1.715-.422 2.579-.626h0l1.621-.402h0l1.631-.404 1.081-.309 2.168-.65h0l.817-.244h0l.819-.245.548-.164c.366-.108.731-.217 1.09-.352h0l1.045-.353c8.364-2.866 16.762-6.728 24.883-11.661h0l.801-.472.392-.249h0l.389-.256.779-.513h0l.781-.513 1.044-.686 2.087-1.392h0l1.526-1.115h0l1.532-1.12.768-.561h0l.77-.562.499-.395.991-.804h0l1.492-1.208h0l1.497-1.213.374-.304c.368-.312.72-.645 1.084-.964h0l.722-.648h0l.724-.648.724-.65h0l.726-.65.727-.652.695-.688 1.134-1.127-23.171-21.577zm119.479 50.796c.352.025.62.331.597.683a.64.64 0 1 1-1.28-.083.64.64 0 0 1 .682-.6zm-367.964.6a.64.64 0 1 1-1.28.083c-.023-.352.246-.658.597-.683a.64.64 0 0 1 .682.6zm382.303-4.391a2.24 2.24 0 0 1-.212 3.16c-.931.812-2.344.717-3.159-.211-.811-.933-.717-2.346.212-3.16a2.24 2.24 0 0 1 3.159.211zm-394.164-.211c.928.814 1.023 2.227.212 3.16-.816.928-2.228 1.023-3.159.211a2.24 2.24 0 0 1-.212-3.16 2.24 2.24 0 0 1 3.159-.211zm56.932-3.34a.64.64 0 1 1 .085 1.277.64.64 0 1 1-.085-1.277zm277.14 0a.64.64 0 1 1-.085 1.277.64.64 0 1 1 .085-1.277zm-265.419-5.998c.073 1.125-.777 2.1-1.902 2.174a2.04 2.04 0 0 1-2.175-1.9c-.076-1.128.777-2.102 1.902-2.177s2.099.775 2.175 1.903zm255.874-1.903c1.125.074 1.978 1.049 1.902 2.177a2.04 2.04 0 0 1-2.175 1.9c-1.125-.074-1.975-1.05-1.902-2.174s1.05-1.978 2.175-1.903zm37.891-1.72a.64.64 0 0 1 .597.683c-.024.35-.33.62-.682.596a.64.64 0 1 1 .085-1.279zm-333.831 0a.64.64 0 1 1 .085 1.279c-.352.025-.658-.245-.682-.596a.64.64 0 0 1 .597-.683zm358.994-12.364c.255.292.224.737-.067.993a.7.7 0 1 1-.925-1.058.71.71 0 0 1 .992.066zm-383.166-.066a.7.7 0 1 1-.925 1.058c-.291-.256-.322-.7-.067-.993a.71.71 0 0 1 .992-.066zm67.682-86.323c-.002.75-.004 1.497.051 2.239h0l.057 1.307c.187 3.912.515 7.736 1.044 11.446h0l.16 1.122c1.154 7.828 2.992 15.148 5.264 21.855h0l.38 1.104c2.3 6.592 4.987 12.595 7.919 17.924h0l.367.711c.627 1.171 1.318 2.28 1.962 3.389h0l.466.792c.618 1.052 1.228 2.085 1.895 3.055h0l.604.916 1.768 2.684h0l.612.847 1.806 2.466h0l.432.58c4.087 5.458 8.039 9.799 11.449 13.181l21.59-23.445-.661-.679h0l-.52-.579-1.079-1.199h0l-.417-.465h0l-.424-.472-.215-.239h0l-.217-.241-.209-.251h0l-.207-.256-.561-.691-1.157-1.425h0l-.296-.366-.595-.746h0l-.429-.587h0l-.435-.595-.589-.806-1.205-1.657h0l-.577-.878-1.183-1.799h0l-.365-.549c-.477-.742-.923-1.524-1.387-2.312h0l-.349-.594c-.471-.794-.955-1.598-1.38-2.453h0l-.428-.791c-1.279-2.396-2.491-4.968-3.613-7.702L146 284l13.108-6.236a95.33 95.33 0 0 1-1.594-4.368h0l-.307-.927c-1.618-4.969-2.912-10.376-3.7-16.144h0l-.154-1.153c-.339-2.702-.542-5.482-.652-8.322l.025.602zm248.83-1.03l-31.794 2.208c-.229 6.603-1.151 13.117-2.754 19.381h0l-.19.771h0l-.189.771-.227.76h0l-.226.759-.302 1.011-.612 2.015h0l-.302.848c-.598 1.698-1.165 3.401-1.881 5.039h0l-.133.331L343 284l-12.991-4.694c-1.398 3.31-3.044 6.479-4.765 9.559h0l-.525.875c-.87 1.46-1.725 2.921-2.693 4.301h0l-.421.629h0l-.421.629-.42.628-.209.312-.225.303-.899 1.207h0l-.896 1.203-.298.4-.601.796h0l-.475.575h0l-.474.574-.946 1.145h0l-.943 1.142-.659.733-1.326 1.45h0l-.397.434c-.528.579-1.053 1.158-1.619 1.694l.341-.335 21.565 23.157.669-.662.563-.554c.37-.375.729-.76 1.086-1.149l1.068-1.172.892-.978 1.782-1.97h0l1.272-1.545h0l1.276-1.55.64-.777h0l.641-.778.407-.532.803-1.081h0l1.207-1.626h0l1.211-1.631.303-.409.283-.424.565-.847.567-.849h0l.567-.851.577-.846c1.325-1.989 2.51-4.081 3.755-6.148h0l.572-1.034c2.47-4.493 4.799-9.132 6.701-14.001h0l.409-.974c.928-2.283 1.684-4.642 2.524-6.979h0l.419-1.358.81-2.729h0l.303-1.026h0l.304-1.026.254-1.041h0l.254-1.043.277-1.112c2.195-8.999 3.356-18.369 3.463-27.846zm-256.273 85.68a.64.64 0 0 1-.597.683c-.354.021-.66-.243-.683-.598a.64.64 0 0 1 1.28-.085zm262.379-.599a.64.64 0 0 1 .596.684c-.023.355-.329.619-.683.598a.64.64 0 1 1 .087-1.282zm-299.615-2.718a.64.64 0 0 1 .682.597c.024.355-.244.661-.597.685a.64.64 0 0 1-.682-.599c-.024-.352.244-.659.597-.683zm336.166 0c.353.024.622.331.597.683a.64.64 0 0 1-.682.599c-.353-.025-.622-.331-.597-.685a.64.64 0 0 1 .682-.597zm-381.029-8.796c.03.444-.305.828-.748.857s-.827-.306-.857-.752c-.03-.44.306-.824.748-.855s.827.307.857.75zm426.749-.75c.442.031.777.416.748.855-.03.446-.413.783-.857.752s-.777-.414-.748-.857.412-.779.857-.75zm-10-16.631a2.59 2.59 0 0 0 .054.19c.031.122.088.299.136.525a18.81 18.81 0 0 1 .32 1.872 26.28 26.28 0 0 1 .191 2.623c.004.111.002.223.003.334.091-.073.182-.151.271-.217l.76-.59a45.58 45.58 0 0 1 2.83-1.989c.855-.555 1.595-.979 2.127-1.267.262-.143.481-.247.625-.319l.224-.109-.136.21c-.094.13-.223.334-.403.574-.354.491-.877 1.166-1.539 1.939a44.98 44.98 0 0 1-2.349 2.539c-.22.225-.45.448-.684.672-.08.081-.163.16-.245.237l.321.051a26.54 26.54 0 0 1 2.576.537c.751.199 1.375.406 1.81.569.219.082.385.16.504.206.046.019.084.036.113.05l.066.032s-.067.022-.188.055c-.122.028-.3.084-.526.135-.454.104-1.1.228-1.871.323s-1.669.166-2.625.187l-.325.009c.072.086.146.175.212.265l.589.758a45 45 0 0 1 1.99 2.828c.553.857.98 1.598 1.265 2.129.144.263.246.482.32.623l.108.228-.21-.138c-.132-.093-.335-.221-.579-.399-.487-.355-1.165-.878-1.938-1.538s-1.647-1.458-2.539-2.352c-.229-.219-.448-.449-.676-.681l-.232-.245a6.89 6.89 0 0 1-.05.319c-.149.944-.337 1.825-.536 2.576s-.407 1.373-.571 1.81c-.081.217-.159.39-.205.505s-.081.176-.081.176-.023-.066-.055-.185-.085-.301-.136-.526a19.59 19.59 0 0 1-.325-1.875 26.53 26.53 0 0 1-.189-2.623c-.004-.105-.004-.215-.007-.323-.086.069-.175.146-.263.212l-.758.589c-1.006.764-1.976 1.438-2.83 1.988a31.13 31.13 0 0 1-2.13 1.267c-.262.143-.48.245-.623.321l-.225.105s.047-.076.136-.21.223-.335.402-.576c.353-.489.875-1.162 1.537-1.938s1.459-1.647 2.351-2.539c.22-.228.452-.446.684-.672.081-.082.168-.161.251-.238-.109-.021-.22-.034-.326-.05-.944-.15-1.825-.34-2.576-.538a17.47 17.47 0 0 1-1.81-.571c-.219-.077-.39-.154-.505-.199-.115-.05-.177-.081-.177-.081s.064-.022.185-.055.302-.086.529-.135a18.99 18.99 0 0 1 1.87-.323c.769-.097 1.667-.166 2.624-.186.109-.007.217-.007.328-.011l-.214-.267-.588-.758c-.763-1.006-1.439-1.976-1.99-2.832a33.45 33.45 0 0 1-1.267-2.125c-.144-.264-.246-.48-.32-.625l-.108-.225s.073.046.209.136.335.223.576.402a31.36 31.36 0 0 1 1.938 1.54c.774.658 1.645 1.46 2.538 2.352.227.217.449.448.674.682.081.08.16.166.24.252.017-.111.029-.221.049-.329.15-.946.339-1.826.536-2.577a20.18 20.18 0 0 1 .569-1.81c.079-.217.157-.387.204-.502.049-.12.08-.182.08-.182zm-407.606 0a3.14 3.14 0 0 0 .08.182c.047.114.125.284.204.502a20.18 20.18 0 0 1 .569 1.81c.197.752.387 1.632.536 2.577.019.108.032.218.049.329l.24-.252c.225-.234.447-.465.674-.682.893-.892 1.764-1.694 2.538-2.352a31.36 31.36 0 0 1 1.938-1.54c.241-.178.443-.308.576-.402l.209-.136-.108.225c-.073.144-.176.36-.32.625a33.45 33.45 0 0 1-1.267 2.125c-.551.857-1.227 1.827-1.99 2.832a28.91 28.91 0 0 1-.588.758l-.214.267c.111.004.219.004.328.011.957.019 1.856.089 2.624.186a18.99 18.99 0 0 1 1.87.323c.227.048.406.106.529.135a4.03 4.03 0 0 1 .185.055s-.062.031-.177.081c-.115.045-.286.122-.505.199a17.47 17.47 0 0 1-1.81.571c-.751.198-1.631.389-2.576.538-.106.016-.217.028-.326.05.083.077.17.156.251.238l.684.672c.892.893 1.69 1.764 2.351 2.539s1.184 1.45 1.537 1.938c.178.241.309.444.402.576l.136.21s-.077-.038-.225-.105l-.095-.049-.237-.119a10.62 10.62 0 0 1-.291-.153 31.13 31.13 0 0 1-2.13-1.267c-.855-.549-1.825-1.224-2.83-1.988-.253-.189-.504-.39-.758-.589-.089-.066-.177-.143-.263-.212l-.007.323a26.53 26.53 0 0 1-.189 2.623 19.59 19.59 0 0 1-.325 1.875c-.051.225-.104.403-.136.526s-.055.185-.055.185-.031-.062-.081-.176-.124-.288-.205-.505c-.163-.437-.373-1.059-.571-1.81s-.387-1.632-.536-2.576a6.89 6.89 0 0 1-.05-.319c-.078.079-.155.166-.232.245l-.676.681c-.892.893-1.764 1.693-2.539 2.352s-1.451 1.184-1.938 1.538c-.244.178-.446.307-.579.399l-.21.138s.036-.081.108-.228c.074-.142.176-.361.32-.623.285-.53.712-1.272 1.265-2.129a45 45 0 0 1 1.99-2.828c.189-.257.389-.504.589-.758.066-.09.14-.178.212-.265l-.325-.009c-.956-.022-1.855-.091-2.625-.187s-1.416-.219-1.871-.323c-.226-.051-.404-.106-.526-.135l-.188-.055.066-.032c.029-.013.067-.03.113-.05.119-.046.285-.124.504-.206.435-.163 1.059-.37 1.81-.569a26.54 26.54 0 0 1 2.576-.537l.321-.051-.245-.237-.684-.672a44.98 44.98 0 0 1-2.349-2.539c-.662-.773-1.185-1.447-1.539-1.939-.18-.24-.309-.444-.403-.574l-.136-.21s.077.035.224.109.363.176.625.319c.532.288 1.273.712 2.127 1.267a45.58 45.58 0 0 1 2.83 1.989c.254.188.505.387.76.59.09.066.181.144.271.217l.003-.334a26.28 26.28 0 0 1 .191-2.623 18.81 18.81 0 0 1 .32-1.872c.048-.225.105-.402.136-.525s.054-.19.054-.19zm65.914 8.305a1.2 1.2 0 0 1-1.118 1.279c-.662.047-1.235-.454-1.279-1.118a1.2 1.2 0 0 1 1.12-1.279c.659-.044 1.233.456 1.278 1.118zm277.056-1.118a1.2 1.2 0 0 1 1.12 1.279c-.044.664-.617 1.165-1.279 1.118a1.2 1.2 0 0 1-1.118-1.279c.045-.662.619-1.162 1.278-1.118zM245 178l.667.003c16.887.169 32.754 6.739 44.816 18.56l.48.476.469.474c11.822 12.059 18.393 27.924 18.563 44.811l.003.676-.003.667c-.169 16.887-6.738 32.751-18.557 44.813l-.476.48-.474.469c-12.063 11.822-27.927 18.395-44.813 18.565L245 308l-.667-.003c-16.889-.169-32.753-6.739-44.815-18.559l-.48-.476-.469-.474c-11.821-12.06-18.394-27.924-18.565-44.812l-.003-.676.003-.667a64.56 64.56 0 0 1 19.034-45.293C211.317 184.761 227.636 178 245 178zm0 4.102l-.659.003c-15.797.166-30.637 6.312-41.927 17.363l-.475.47-.463.468a60.47 60.47 0 0 0-17.369 41.925l-.004.668.003.659c.169 16.02 6.486 31.055 17.832 42.402s26.381 17.662 42.399 17.831l.659.003H245l.659-.003a60.47 60.47 0 0 0 41.928-17.363l.475-.47.463-.468a60.47 60.47 0 0 0 17.37-41.924l.004-.668-.003-.659c-.166-15.798-6.313-30.637-17.364-41.926l-.47-.475-.468-.463c-11.448-11.209-26.544-17.373-42.593-17.373zm.001 1.898l.622.003c20.307.207 38.714 10.557 49.469 27.813l.324.525.117.103v.09l.358.6c5.188 8.819 7.981 18.863 8.106 29.149l.004.718-.008.974c-.517 31.764-26.263 57.506-58.027 58.018l-.964.008-.974-.008c-31.766-.517-57.507-26.262-58.019-58.028l-.008-.964.004-.702c.122-10.287 2.914-20.333 8.097-29.153l.365-.613v-.373l.231-.002C205.528 194.518 224.311 184 245.001 184zm50.204 30.016l.146.545c1.027 3.935 1.577 7.993 1.642 12.095l.006.821-.007.851c-.456 27.74-23.147 50.219-51.143 50.666l-.85.007-.859-.007c-27.997-.451-50.685-22.933-51.135-50.674l-.007-.842.006-.821a51.18 51.18 0 0 1 1.784-12.635c-5.077 8.778-7.754 18.77-7.754 28.98 0 31.424 25.136 57.086 56.359 57.939C213.677 299.558 190 274.668 190 244.16a57.66 57.66 0 0 1 1.801-14.354l.213-.806.018.897c.781 29.265 24.171 52.803 53.083 53.275l.887.007.887-.007c28.913-.473 52.304-24.015 53.078-53.283l.017-.889.213.807a57.58 57.58 0 0 1 1.797 13.479l.006.873-.008.94c-.238 14.929-6.147 28.459-15.634 38.467 10.12-10.314 16.423-24.385 16.599-39.901l.004-.666-.004-.708c-.121-9.965-2.791-19.699-7.751-28.277zm-189.595 83.269c.024.351-.244.659-.595.683a.64.64 0 0 1-.086-1.278.64.64 0 0 1 .681.595zm276.861-.595a.64.64 0 0 1-.086 1.278c-.351-.024-.619-.332-.595-.683a.64.64 0 0 1 .681-.595zm-357.345-.504a.81.81 0 0 1-.751.861.81.81 0 0 1-.857-.752c-.03-.444.307-.826.75-.857s.828.305.859.749zm438.007-.749c.443.031.78.413.75.857a.81.81 0 0 1-.857.752.81.81 0 0 1-.751-.861c.03-.444.414-.778.859-.749zM72.812 294.28c.076 1.127-.774 2.102-1.901 2.177s-2.1-.777-2.174-1.902a2.04 2.04 0 1 1 4.075-.275zm343.953-1.898a2.04 2.04 0 0 1 1.9 2.173c-.074 1.124-1.049 1.978-2.174 1.902s-1.977-1.049-1.901-2.177a2.04 2.04 0 0 1 2.174-1.898zm-31.623-.768a.64.64 0 1 1-.087 1.277.64.64 0 0 1-.596-.681.64.64 0 0 1 .682-.596zm74.599-7.974c.443.029.778.415.748.857s-.413.777-.856.748a.8.8 0 0 1-.75-.856c.028-.441.413-.777.858-.749zm-431.221.749a.8.8 0 0 1-.75.856c-.443.03-.826-.304-.856-.748s.305-.828.748-.857.83.307.858.749zm391.719-6.988a.7.7 0 1 1-1.058.924c-.256-.292-.226-.737.066-.993s.735-.225.992.069zm-352.084-.069c.292.256.322.701.066.993a.7.7 0 1 1-1.058-.924c.256-.294.7-.322.992-.069zm-20.182-.289a.64.64 0 0 1 .684.597c.023.353-.245.658-.597.682a.64.64 0 0 1-.086-1.28zm391.456 0a.64.64 0 0 1-.086 1.28c-.352-.024-.62-.329-.597-.682a.64.64 0 0 1 .684-.597zm-194.428-91.028l-.604.003c-19.712.199-37.579 10.155-48.016 26.75l-.314.505-.232.812a50.22 50.22 0 0 0-1.81 13.391c0 27.573 22.412 50.054 50.134 50.501l.842.007.842-.007c27.443-.442 49.685-22.481 50.127-49.676l.007-.826-.007-.852c-.071-4.258-.679-8.469-1.806-12.539l-.232-.812-.317-.51c-10.542-16.762-28.665-26.748-48.612-26.748zm188.243 88.689c.661.045 1.163.617 1.12 1.278s-.619 1.164-1.282 1.118-1.161-.617-1.117-1.28a1.2 1.2 0 0 1 1.279-1.116zM55.437 275.82c.044.664-.456 1.236-1.117 1.28s-1.237-.456-1.282-1.118.458-1.233 1.12-1.278a1.2 1.2 0 0 1 1.279 1.116zm347.587-12.614a.64.64 0 0 1 .597.682c-.023.353-.329.619-.684.597a.64.64 0 1 1 .086-1.279zm-317.966.596a.64.64 0 0 1-.595.683c-.355.022-.661-.244-.684-.597a.64.64 0 1 1 1.278-.086zm-44.389-45.761c11.911 0 21.589 9.559 21.782 21.424l.003.36c0 11.913-9.559 21.593-21.424 21.785l-.36.003c-4.053 0-7.845-1.112-11.096-3.04 8.43-1.806 14.78-9.218 14.95-18.147l.003-.368c0-4.881-1.847-9.329-4.88-12.685-.338-.157-.61-.437-.756-.786-2.571-2.539-5.866-4.347-9.548-5.087l-.343-.066c3.244-2.062 7.068-3.296 11.175-3.388l.494-.006zm408.115 0l.494.006c3.228.072 6.28.849 9.014 2.18a.7.7 0 1 1 1.058-.92.7.7 0 0 1-.58 1.161c.577.297 1.138.62 1.684.967h0l-.343.066c-8.661 1.743-15.184 9.386-15.184 18.558h0l.003.368c.079 4.173 1.508 8.014 3.868 11.106a.7.7 0 0 1 .84.164c.223.257.228.631.028.89 2.629 2.979 6.184 5.124 10.215 5.987-3.251 1.928-7.042 3.04-11.096 3.04h0l-.36-.003c-10.825-.176-19.731-8.249-21.209-18.71l.051.007a.64.64 0 0 1-.188-1.237 21.74 21.74 0 0 1-.078-1.845h0l.003-.36c.192-11.865 9.871-21.424 21.782-21.424h0zm-32.095 39.495a2.24 2.24 0 0 1-.213 3.158c-.932.816-2.345.723-3.157-.209a2.24 2.24 0 0 1 .211-3.16c.931-.811 2.344-.716 3.159.212zm-42.12-.399c1.124.077 1.977 1.049 1.9 2.177a2.04 2.04 0 1 1-4.077-.274c.076-1.126 1.05-1.979 2.177-1.903zm-259.561 1.903a2.04 2.04 0 1 1-4.077.274c-.076-1.127.777-2.1 1.9-2.177s2.101.777 2.177 1.903zm-76.256-7.41a.7.7 0 1 1-.923 1.056.7.7 0 1 1 .923-1.056zm117.507-95.746c-1.075 1.072-2.13 2.156-3.121 3.292h0l-.687.755h0l-.687.752-.685.752-.342.375-.323.394-1.293 1.569h0l-1.289 1.564-.429.521-.844 1.04h0l-.6.808h0l-.598.807-1.194 1.608h0l-.581.784c.049.118.08.247.089.382.045.663-.456 1.235-1.118 1.282-.051.003-.102.004-.151.001l-.174.255-1.468 2.203h0l-.44.659-1.266 1.945v-.059a.64.64 0 0 1-.317.598l-.107.179-1.006 1.687h0l-1.002 1.681-.5.838-.456.862-.455.859h0l-.455.858-.454.856h0l-.678 1.281c-.228.425-.459.849-.652 1.29h0l-.814 1.741h0l-.811 1.734-.404.865h0l-.396.865-.36.881h0l-.358.878-.715 1.752h0l-.712 1.745-.429 1.176-.827 2.354h0l-.309.879h0l-.308.877-.154.437h0l-.147.44-.263.887-.346 1.13c-2.724 9.043-4.347 18.08-5.015 26.829h0l-.04.426c-.031.427-.04.855-.064 1.28h0l-.039.85h0l-.039.848-.051 1.128-.089 2.243h0l.004 1.673h0l.001.32 32.426-2.251.015-.29.039-.838.03-.63h0l.03-.632.02-.422a11.26 11.26 0 0 1 .059-.845h0l.085-1.017c.575-6.452 1.85-13.102 3.931-19.746h0l.197-.659.11-.326h0l.115-.325.23-.651h0l.23-.653.308-.872.629-1.748h0l.14-.343L143 203l16.531 5.973.277-.675.268-.652h0l.268-.653.295-.643h0l.301-.642.604-1.287h0l.607-1.292.206-.43.447-.845h0l.338-.634h0l.338-.636.339-.637h0l.339-.638.34-.639.372-.622.746-1.248h0l.749-1.253.375-.628c.387-.621.805-1.225 1.212-1.838h0l.546-.816 1.102-1.634h0l.886-1.19h0l.889-1.195.445-.598h0l.446-.6.315-.392h0l.636-.769.955-1.156h0l.957-1.159.24-.291.255-.279.51-.559.512-.56h0l.513-.561.679-.753.583-.616zm175.492-1.797l-21.915 23.549 2.266 2.28.298.3c.292.307.567.629.852.941h0l1.131 1.259 1.13 1.258 1.067 1.311 1.064 1.313.532.656.265.329.249.341 1.993 2.725.249.34h0l.243.344.463.704.927 1.409.926 1.408.292.479.569.967h0l.854 1.45.427.725.213.362.196.371 1.56 2.976.288.548h0l.05.098h0l.047.099.353.761.705 1.522.704 1.52.216.514.419 1.034-.14-.346L343 203l-12.267 5.838.282.697.314.774.157.387.69 1.97h0l.551 1.574.092.262c.062.175.125.349.176.527h0l.237.799.474 1.596.473 1.594.203.805h0l.197.807.396 1.612.097.403c.1.402.205.803.276 1.212h0l.317 1.625h0l.316 1.623.104.541c.062.362.113.725.165 1.088h0l.238 1.632.237 1.63.086.819h0l.079.819.159 1.635.079.817.039.409.021.41.08 1.637h0l.052 1.077 31.815 2.21-.031-2.07-.033-1.176-.111-2.206h0l-.111-2.209-.029-.553-.054-.551-.108-1.102-.217-2.208-.072-.737-.152-1.474h0l-.324-2.201-.323-2.203-.08-.552c-.081-.552-.168-1.102-.286-1.648h0l-.429-2.191h0l-.43-2.193-.109-.549c-.121-.546-.271-1.086-.398-1.631h0l-.536-2.176-.268-1.089h0l-.275-1.087-.641-2.151-.642-2.155-.322-1.078-.113-.357-.249-.707h0l-.746-2.125h0l-.747-2.126-.187-.533-.212-.522-.425-1.046-.85-2.092-.284-.698-.576-1.392h0l-.953-2.052-.954-2.054-.477-1.026-.168-.338-.351-.668h0l-1.055-2.007h0l-1.055-2.009-.265-.501-.288-.489-.578-.978-1.154-1.956-.385-.652-.779-1.3h0l-1.251-1.899-1.251-1.901-.627-.951-.216-.311h0l-.448-.612-2.692-3.676-.338-.46-.357-.444-.719-.885-1.438-1.771-1.441-1.769-1.526-1.698-1.527-1.698-.382-.424c-.38-.426-.758-.854-1.171-1.25h0l-3.161-3.177zm69.104 85.339c.253.294.223.739-.067.992s-.736.225-.992-.066-.225-.739.067-.993.734-.225.992.067zm-313.318-.067c.292.254.322.7.067.993s-.698.321-.992.066-.32-.697-.067-.992c.258-.292.7-.321.992-.067zm377.188-6c.443.028.779.413.749.855s-.413.778-.857.75-.78-.414-.75-.858.414-.777.859-.747zm-441.191.747c.03.445-.307.827-.75.858s-.827-.306-.857-.75.306-.826.749-.855.828.305.859.747zm65.989-3.098a2.04 2.04 0 0 1-1.9 2.174c-1.125.074-2.1-.776-2.174-1.901a2.04 2.04 0 1 1 4.075-.273zm310.528-1.899a2.04 2.04 0 0 1 1.902 2.172c-.075 1.126-1.049 1.976-2.174 1.901a2.04 2.04 0 0 1 .273-4.073zm-13.908-6.302a.64.64 0 1 1-.086 1.28.64.64 0 0 1 .086-1.28zm-284.885 0a.64.64 0 0 1 .086 1.28.64.64 0 1 1-.086-1.28zm-72.218-3.569c.292.255.322.698.067.992s-.7.319-.99.067a.7.7 0 1 1 .923-1.059zm355.777-3.746a2.24 2.24 0 0 1-.212 3.16c-.931.812-2.344.716-3.159-.213a2.24 2.24 0 0 1 .212-3.16c.932-.811 2.345-.716 3.16.213zm-279.073-.213a2.24 2.24 0 0 1 .212 3.16c-.815.928-2.228 1.024-3.159.213a2.24 2.24 0 0 1-.212-3.16c.815-.928 2.228-1.024 3.16-.213zm321.23-.574c.815.931.719 2.342-.212 3.156s-2.344.72-3.157-.212-.72-2.344.211-3.156a2.24 2.24 0 0 1 3.158.212zm-363.388-.212c.931.812 1.027 2.227.211 3.156s-2.227 1.027-3.157.212-1.026-2.225-.212-3.156a2.24 2.24 0 0 1 3.158-.212zm383.708-4.662c.443.031.778.415.748.859s-.413.779-.857.75-.777-.415-.748-.858.413-.78.856-.751zm-406.33.751c.03.443-.304.827-.748.858s-.827-.307-.857-.75.306-.828.748-.859.826.307.856.751zm395.656-6.59a.64.64 0 0 1 .597.682.64.64 0 1 1-1.28-.085.64.64 0 0 1 .682-.597zm-385.839 0a.64.64 0 0 1 .682.597.64.64 0 1 1-1.28.085.64.64 0 0 1 .597-.682zm64.013-5.605a2.04 2.04 0 1 1-4.076.275 2.04 2.04 0 0 1 1.9-2.174c1.126-.074 2.101.774 2.176 1.899zm259.988-1.899a2.04 2.04 0 0 1-.273 4.072 2.04 2.04 0 0 1-1.903-2.173c.075-1.124 1.049-1.973 2.176-1.899zm49.23.347a1.2 1.2 0 0 1-.16 2.396 1.2 1.2 0 1 1 .16-2.396zm-359.346 1.116a1.2 1.2 0 1 1-2.398.161 1.2 1.2 0 1 1 2.398-.161zm25.583-7.36a.7.7 0 0 1 .066.991c-.254.293-.697.324-.99.065-.292-.251-.322-.696-.066-.987a.7.7 0 0 1 .99-.069zm307.892.069c.255.291.225.735-.066.987-.293.259-.736.228-.99-.065a.7.7 0 1 1 1.056-.922zm2.486-10.229a.64.64 0 1 1-.086 1.278.64.64 0 1 1 .086-1.278zm-313.854 0a.64.64 0 1 1 .086 1.278.64.64 0 1 1-.086-1.278zm268.294-3.053c.355.022.62.325.597.68a.64.64 0 0 1-1.28-.084.64.64 0 0 1 .683-.596zm-222.734 0a.64.64 0 0 1 .683.596.64.64 0 1 1-1.28.084c-.023-.355.243-.658.597-.68zm216.689-.408a.64.64 0 1 1-.086 1.28.64.64 0 1 1 .086-1.28zm-106.195-58.11l-.276.003c-.561 0-1.122-.007-1.68.036h0l-2.236.117h0l-2.234.118-.558.028c-.557.037-1.113.096-1.668.153h0l-2.22.222-2.217.223-.735.101-1.466.219h0l-2.199.327-1.098.162-.548.082-.543.107-2.175.43h0l-2.17.43-1.114.246c-11.121 2.509-21.783 6.46-31.551 11.709h0l-.952.499h0l-.95.499-.923.544h0l-.922.542-1.228.724-2.443 1.456h0l-1.777 1.169h0l-1.774 1.167-.885.581-.442.292-.426.312-.854.624h0l-.852.623-.979.704c-4.217 3.075-8.119 6.487-11.857 9.979h0l-.732.728-1.257 1.241 24.067 22.164.478-.473.752-.696c2.768-2.546 5.663-5.016 8.795-7.229h0l.633-.462h0l.634-.462.319-.232.328-.216.658-.432 1.318-.866h0l1.321-.867.904-.545 1.825-1.072h0l.686-.403h0l.686-.403.706-.37h0l.707-.37.869-.46c1.825-.952 3.69-1.845 5.591-2.675L203 145l6.486 13.628c5.271-2.204 10.801-3.936 16.486-5.163h0l1.612-.318h0l1.614-.319.405-.079.407-.061 2.448-.363.817-.121h0l.818-.115 1.646-.165 1.648-.164.55-.056a17.42 17.42 0 0 1 1.103-.079h0l1.519-.079 2.269-32.683zm4.026-.02l-1.498.008h0l-.186.001 2.261 32.564 1.592.069 2.505.109.278.018.556.051h0l1.667.152h0l1.668.152.418.038.415.058.831.117 1.662.233.554.078 1.109.163h0l1.651.314 1.653.314.826.157.411.093h0l.41.099 1.637.395h0l1.639.395.409.1.405.119.809.237 1.618.476.54.159 1.077.325h0l3.192 1.111.798.277.361.138L284 145l-4.647 12.862.763.308h0l1.568.635.392.159.385.177.768.356 1.536.713 1.536.715 1.498.789 1.499.79.375.198c.376.196.753.39 1.112.615h0l2.916 1.728.365.216h0l.362.221.706.468 1.413.937 1.413.937.235.156c.155.107.306.22.457.333h0l.682.504 2.73 2.017 2.617 2.147.654.537.219.178c.145.12.288.242.425.371h0l1.255 1.141.042.039 23.635-21.995-.031-.03-.846-.768-1.691-1.535-1.691-1.537-.283-.255c-.192-.166-.389-.327-.587-.488h0l-.886-.726-3.542-2.903-3.677-2.715-.92-.679-.306-.227c-.205-.15-.413-.297-.627-.433h0l-1.907-1.263-2.859-1.896-.324-.201-.656-.388h0l-3.934-2.329-.492-.291c-.498-.28-1.011-.533-1.514-.804h0l-2.021-1.064-2.022-1.064-2.07-.963-2.071-.961-1.036-.48-.517-.238-.529-.214-2.115-.855h0l-2.114-.854-.353-.142c-.235-.096-.469-.193-.709-.277h0l-3.228-1.122-2.15-.748-.725-.224-1.456-.426h0l-2.183-.641-1.091-.32-.545-.16-.552-.135-4.416-1.064-.367-.088c-.245-.06-.49-.121-.737-.17h0l-1.114-.212-2.227-.423-2.226-.422-.746-.115h0l-1.494-.208-2.24-.314-1.119-.157-.56-.077-.563-.051-2.248-.205h0l-2.246-.205-.374-.034c-.249-.024-.499-.049-.749-.058h0l-1.126-.049-2.249-.097-2.247-.097zm-125.223 53.328c.292.256.322.7.067.992s-.7.323-.992.066-.32-.701-.066-.99a.7.7 0 0 1 .991-.068zm245.13.068c.254.29.225.734-.066.99s-.737.226-.992-.066-.225-.735.067-.992a.7.7 0 0 1 .991.068zm-282.71-1.5a26.28 26.28 0 0 1-2.576.538c-.106.019-.217.033-.325.048l.25.239.685.672c.39.392.763.779 1.114 1.156l.066-.166.371-.818.763-1.632h0l.073-.154-.422.116zm260.953-.57a1.2 1.2 0 0 1 1.118 1.278c-.044.662-.617 1.164-1.279 1.12s-1.164-.619-1.118-1.282a1.2 1.2 0 0 1 1.279-1.117zm60.131.971l.405.87.113-.111.347-.335c.081-.081.167-.162.25-.239-.107-.015-.219-.029-.325-.048-.269-.042-.534-.088-.791-.137zM117.81 158.963c.076 1.123-.775 2.097-1.902 2.173s-2.1-.779-2.174-1.9.775-2.1 1.902-2.175 2.1.776 2.174 1.903zm-62.808-2.175a.64.64 0 1 1 .088 1.282.64.64 0 0 1-.684-.597c-.024-.353.243-.661.596-.685zm377.397 0c.353.024.62.332.596.685a.64.64 0 0 1-.684.597.64.64 0 1 1 .088-1.282zm-409.843.356c.03.442-.305.828-.749.856s-.828-.305-.857-.747.307-.827.75-.857.826.305.856.749zm443.145-.749c.443.031.78.41.75.857s-.414.778-.857.747-.779-.414-.749-.856.413-.777.856-.749zm-26.759-.988c.443.029.777.416.749.856a.8.8 0 0 1-.856.749c-.444-.029-.78-.411-.75-.855s.413-.779.857-.75zm-389.626.75c.03.444-.306.826-.75.855a.8.8 0 0 1-.856-.749c-.029-.44.306-.828.749-.856s.828.307.857.75zm87.728-10.73a.64.64 0 1 1-1.279.086.64.64 0 1 1 1.279-.086zm213.995-.596a.64.64 0 0 1 .597.682.64.64 0 1 1-1.279-.086.64.64 0 0 1 .681-.596zm-242.589-3.882a2.24 2.24 0 0 1 .21 3.158c-.812.933-2.226 1.028-3.157.213a2.24 2.24 0 0 1-.213-3.158 2.24 2.24 0 0 1 3.16-.213zm273.662.213a2.24 2.24 0 0 1-.213 3.158c-.931.816-2.344.72-3.157-.213a2.24 2.24 0 0 1 .21-3.158 2.24 2.24 0 0 1 3.16.213zM89.913 98c9.864 2.412 17.215 11.228 17.386 21.793l.003.378c0 12.481-10.018 22.625-22.451 22.826l-.378.003c-2.201 0-4.33-.312-6.344-.894a2.55 2.55 0 0 1-2.05 1.28c-1.414.095-2.637-.975-2.732-2.386a2.56 2.56 0 0 1 .084-.847c-5.14-2.847-9.066-7.623-10.802-13.35a19.85 19.85 0 0 0 27.106-.381l.274-.269c1.38-1.38 2.514-2.913 3.402-4.543a.61.61 0 0 1-.218.056.64.64 0 0 1-.683-.6c-.024-.353.243-.655.597-.677.325-.022.612.202.67.515 3.606-7.307 2.44-16.372-3.501-22.541l-.267-.272-.048-.046h0L89.913 98zm314.105 0l-.048.046h0l-.048.046-.267.272c-7.48 7.768-7.391 20.13.267 27.79h0l.274.269a19.85 19.85 0 0 0 27.106.381c-2.484 8.192-9.446 14.437-18.037 15.88a2.56 2.56 0 0 1-1.943.703 2.54 2.54 0 0 1-1.209-.396l-.261.006h0l-.395.003-.377-.003c-8.668-.141-16.161-5.113-19.906-12.341-.084.281-.352.474-.655.453a.64.64 0 0 1-.597-.682c.024-.355.331-.621.684-.6a.64.64 0 0 1 .179.038c-1.383-2.943-2.156-6.229-2.156-9.696h0l.003-.378c.171-10.565 7.523-19.38 17.386-21.793h0zm-258.772 27.036l.007.316.007.876a41.06 41.06 0 0 1-.121 3.156l-.087.935a158.02 158.02 0 0 1 3.649-3.142c-.34-.164-.752-.379-1.205-.646a24.12 24.12 0 0 1-2.009-1.315c-.081-.058-.162-.12-.24-.179zm196.91 0l-.24.179c-.466.338-.924.647-1.358.92l1.603 1.316-.018-1.224c-.004-.29.003-.58.007-.876l.007-.316zm-5.846-2.221l2.089 1.546 1.006.829c.367-.449.789-.929 1.25-1.415l.212-.215-.313-.036-.871-.111c-1.141-.156-2.203-.346-3.112-.54l-.262-.058zm133.342-1.261a.81.81 0 0 1 .748.859c-.03.442-.412.778-.856.749a.81.81 0 0 1-.749-.857.81.81 0 0 1 .857-.751zm-451.045.751a.81.81 0 0 1-.749.857c-.444.029-.826-.307-.856-.749a.81.81 0 0 1 .748-.859.81.81 0 0 1 .857.751zm51.101-1.234c.023.352-.243.661-.597.686s-.658-.249-.683-.6a.64.64 0 1 1 1.28-.086zm348.668-.596a.64.64 0 0 1 .597.682c-.024.351-.329.621-.683.6s-.62-.333-.597-.686a.64.64 0 0 1 .682-.596zm-237.012-.589a.64.64 0 0 1 .681.6c.024.353-.243.657-.595.679a.64.64 0 0 1-.684-.595c-.024-.353.243-.658.597-.684zm124.674 0c.354.025.622.33.597.684a.64.64 0 0 1-.684.595c-.352-.022-.619-.325-.595-.679a.64.64 0 0 1 .681-.6zm-191.991-4.519a1.32 1.32 0 0 1 .123 1.861c-.458.521-1.24.589-1.787.172a.7.7 0 0 1-.995.075c-.291-.254-.321-.698-.066-.99a.7.7 0 0 1 .551-.236 1.27 1.27 0 0 1 .315-.754c.477-.549 1.311-.606 1.858-.128zm261.165.128a1.27 1.27 0 0 1 .315.754.7.7 0 0 1 .551.236c.255.292.225.736-.066.99a.7.7 0 0 1-.99-.067l-.004-.008c-.547.417-1.329.348-1.787-.172a1.32 1.32 0 0 1 .123-1.861c.547-.478 1.381-.42 1.858.128zm-37.133-2.464c.255.291.225.735-.066.991s-.735.224-.992-.07a.7.7 0 0 1 .066-.988c.294-.254.738-.225.991.067zm-187.765-.067a.7.7 0 0 1 .066.988c-.256.294-.699.322-.992.07s-.321-.7-.066-.991.697-.321.991-.067zm140.617-3.605a2.04 2.04 0 0 1 1.899 2.175c-.075 1.127-1.047 1.978-2.173 1.9a2.04 2.04 0 0 1-1.902-2.174c.076-1.125 1.049-1.975 2.175-1.901zm-92.285 1.901a2.04 2.04 0 0 1-1.902 2.174c-1.126.077-2.098-.773-2.173-1.9a2.04 2.04 0 0 1 1.899-2.175c1.126-.074 2.099.776 2.175 1.901zm239.836-.873c.443.029.779.415.749.86-.029.44-.414.777-.856.747s-.78-.413-.751-.856.415-.782.858-.751zm-388.704.751c.029.443-.307.828-.751.856s-.827-.307-.856-.747c-.03-.445.306-.832.749-.86s.828.307.858.751zm170.007-1.416a.64.64 0 1 1-1.278.086.64.64 0 0 1 1.278-.086zm48.515-.597a.64.64 0 1 1-.086 1.278.64.64 0 0 1 .086-1.278zm-208.719-.258c.03.444-.306.826-.75.855s-.826-.303-.856-.749.306-.83.749-.858.827.306.857.751zm369.097-.751c.443.028.779.414.749.858s-.414.78-.856.749-.78-.411-.75-.855.413-.783.857-.751zm-210.3-.224a.64.64 0 0 1 .681.592.64.64 0 1 1-1.278.089.64.64 0 0 1 .597-.681zm50.646 0a.64.64 0 0 1 .597.681.64.64 0 1 1-1.278-.089.64.64 0 0 1 .681-.592zm60.348-12.926a.64.64 0 0 1 .597.68.64.64 0 1 1-1.281-.086.64.64 0 0 1 .684-.594zm-170.658.594a.64.64 0 1 1-1.281.086.64.64 0 1 1 1.281-.086zm138.358-2.76c.353.022.619.326.596.681a.64.64 0 1 1-1.278-.086.64.64 0 0 1 .682-.595zm-106.741 0a.64.64 0 0 1 .682.595.64.64 0 1 1-1.278.086c-.023-.356.243-.659.596-.681zm-65.927-2.919a.81.81 0 0 1-.749.857.81.81 0 0 1-.859-.749.81.81 0 0 1 .751-.858c.443-.029.826.305.856.75zm239.451-.75a.81.81 0 0 1 .751.858.81.81 0 0 1-.859.749.81.81 0 0 1-.749-.857c.03-.445.413-.779.856-.75zm-85.83-.287a.64.64 0 0 1 .684.596.64.64 0 1 1-1.28.086.64.64 0 0 1 .596-.682zm-68.647 0a.64.64 0 0 1 .596.682.64.64 0 1 1-1.28-.086.64.64 0 0 1 .684-.596zm146.843-.029a.64.64 0 0 1-.086 1.28c-.352-.024-.62-.329-.597-.684s.33-.619.684-.596zm-225.04 0c.353-.023.659.245.684.596s-.245.659-.597.684a.64.64 0 1 1-.086-1.28zm-63.768-1.033c.056.832-.574 1.552-1.404 1.61s-1.552-.577-1.607-1.408.573-1.548 1.405-1.604 1.551.572 1.606 1.402zm354.182-1.402c.832.055 1.46.773 1.405 1.604s-.776 1.463-1.607 1.408-1.46-.778-1.404-1.61.776-1.46 1.606-1.402zm-137.858.154a.64.64 0 0 1 .085 1.279c-.353.022-.659-.242-.683-.595s.245-.659.598-.684zm-80.073 0c.353.024.621.328.598.684s-.33.617-.683.595a.64.64 0 0 1 .085-1.279zm-111.799.314a.81.81 0 0 1-.75.859c-.444.029-.827-.307-.857-.751a.81.81 0 0 1 .75-.857.81.81 0 0 1 .857.749zm304.527-.749a.81.81 0 0 1 .75.857c-.03.444-.414.78-.857.751a.81.81 0 0 1-.75-.859.81.81 0 0 1 .857-.749zM178.98 84.328a.64.64 0 0 1 .681.597.64.64 0 0 1-1.279.084.64.64 0 0 1 .598-.681zm129.442 0a.64.64 0 0 1 .598.681.64.64 0 1 1-1.279-.084.64.64 0 0 1 .681-.597zm-95.404-3.83a1.2 1.2 0 1 1-.162 2.398 1.2 1.2 0 1 1 .162-2.398zm62.646 1.116a1.2 1.2 0 0 1-2.395.161 1.2 1.2 0 1 1 2.395-.161zm-33.298-1.716a.64.64 0 0 1 .596.681c-.024.352-.328.619-.682.597a.64.64 0 1 1 .087-1.278zm3.354.595a.64.64 0 0 1-.596.684c-.355.022-.658-.246-.682-.597a.64.64 0 1 1 1.278-.086zm5.879-2.321c.353-.022.658.242.683.597a.64.64 0 1 1-1.28.086.64.64 0 0 1 .597-.684zm-15.794 0a.64.64 0 0 1 .597.684.64.64 0 1 1-1.28-.086c.025-.356.33-.619.683-.597zm34.123-3.091c1.124.074 1.977 1.049 1.901 2.174s-1.05 1.977-2.175 1.903-1.977-1.051-1.9-2.175 1.049-1.977 2.174-1.903zm-50.278 1.903c.076 1.124-.775 2.1-1.9 2.175s-2.099-.776-2.175-1.903.777-2.1 1.901-2.174 2.099.775 2.174 1.903zm-105.625 1.242a.64.64 0 0 1-.596.684c-.353.022-.659-.245-.683-.597a.64.64 0 0 1 .598-.682c.353-.025.658.24.681.596zm260.035-.596a.64.64 0 0 1 .598.682c-.024.352-.33.619-.683.597a.64.64 0 0 1-.596-.684c.023-.356.328-.621.681-.596zm-237.889-.33c.045.664-.456 1.238-1.118 1.283s-1.234-.458-1.28-1.121a1.2 1.2 0 0 1 1.118-1.278c.661-.043 1.234.458 1.279 1.116zm216.342-1.116a1.2 1.2 0 0 1 1.118 1.278c-.045.663-.617 1.164-1.28 1.121s-1.163-.619-1.118-1.283c.045-.658.618-1.159 1.279-1.116zm-267.34 1.13c.03.446-.306.831-.75.859s-.826-.305-.856-.751a.8.8 0 0 1 .748-.853c.445-.029.828.305.859.745zm317.917-.745a.8.8 0 0 1 .748.853c-.03.446-.413.782-.856.751s-.78-.413-.75-.859c.03-.44.414-.774.859-.745zm-215.464-2.876a.7.7 0 1 1-.924 1.055c-.292-.254-.322-.7-.066-.993a.7.7 0 0 1 .99-.062zm113.143.062c.255.292.225.739-.066.993a.7.7 0 1 1-.924-1.055.7.7 0 0 1 .99.062zM38.051 73.72c.03.444-.306.826-.75.855s-.825-.302-.856-.747.306-.829.749-.858.827.307.858.75zm412.156-.75c.442.029.779.415.749.858s-.414.777-.856.747-.78-.411-.75-.855.412-.779.858-.75zm-286.103-1.653a.64.64 0 1 1-.086 1.278.64.64 0 1 1 .086-1.278zm159.193 0a.64.64 0 0 1 .086 1.278.64.64 0 1 1-.086-1.278zm-153.858-3.525c.931.811 1.025 2.228.212 3.156-.814.933-2.227 1.029-3.158.213a2.24 2.24 0 0 1-.213-3.158 2.24 2.24 0 0 1 3.159-.21zm151.683.21a2.24 2.24 0 0 1-.213 3.158c-.932.816-2.344.72-3.158-.213-.813-.928-.719-2.344.212-3.156a2.24 2.24 0 0 1 3.159.21zm28.729 1.534a.64.64 0 0 1 .68.596c.024.353-.24.658-.594.681s-.66-.238-.683-.594a.64.64 0 0 1 .597-.683zm-212.299 0a.64.64 0 0 1 .597.683c-.023.356-.327.618-.683.594s-.618-.327-.594-.681a.64.64 0 0 1 .68-.596zm200.139-.73a.8.8 0 0 1 .751.855c-.03.443-.414.779-.858.75a.81.81 0 0 1-.748-.858.8.8 0 0 1 .855-.747zm-187.123.747a.81.81 0 0 1-.748.858c-.444.029-.828-.307-.858-.75a.8.8 0 1 1 1.606-.108zm238.892-3.933a2.04 2.04 0 1 1-.274 4.075c-1.124-.075-1.975-1.047-1.901-2.174s1.049-1.975 2.174-1.9zm-289.342 1.9c.074 1.127-.777 2.1-1.901 2.174a2.04 2.04 0 1 1-.274-4.075c1.125-.075 2.1.775 2.174 1.9zm240.34-.687c.353-.023.658.245.683.596a.64.64 0 1 1-1.28.086c-.023-.353.245-.658.597-.682zm-193.512 0c.352.024.62.329.597.682a.64.64 0 1 1-1.28-.086c.025-.351.33-.619.683-.596zm110.059-18.489l.077.214c.044.142.118.35.195.61.158.527.359 1.283.555 2.191a41.9 41.9 0 0 1 .543 3.11 35.41 35.41 0 0 1 .111.868l.035.317.215-.21a24.45 24.45 0 0 1 1.816-1.574c.56-.435 1.055-.773 1.414-.998.178-.112.329-.194.426-.252l.157-.086-.063.168c-.046.104-.104.266-.194.456-.175.387-.443.924-.801 1.538s-.803 1.299-1.315 2.009a12.53 12.53 0 0 1-.18.24l.315-.008.876-.005.475.003a.71.71 0 0 1 .17-.518c.255-.291.7-.32.99-.066.187.164.265.397.233.625l1.286.077c.926.073 1.702.17 2.243.258.273.04.485.086.632.11l.187.04.037.008-.216.076c-.14.043-.347.122-.611.197-.526.157-1.28.36-2.189.555s-1.969.384-3.111.542c-.285.041-.575.074-.868.11-.104.015-.211.022-.314.035.07.071.143.144.211.22a23.8 23.8 0 0 1 1.573 1.815c.436.561.773 1.056.999 1.413.114.18.194.327.253.425l.085.156s-.058-.017-.168-.059c-.104-.046-.264-.106-.455-.196a16.51 16.51 0 0 1-1.536-.803c-.613-.353-1.303-.8-2.01-1.315-.079-.055-.159-.119-.24-.176 0 .104.006.212.006.313l.008.878c-.002 1.152-.048 2.227-.121 3.156a29.54 29.54 0 0 1-.261 2.244c-.041.271-.087.486-.114.629l-.047.226-.076-.217c-.045-.139-.118-.346-.197-.61-.159-.526-.361-1.281-.556-2.188a41.34 41.34 0 0 1-.543-3.112c-.043-.286-.075-.577-.109-.87-.014-.101-.022-.204-.034-.306a4.6 4.6 0 0 1-.214.204 24.01 24.01 0 0 1-1.814 1.574c-.561.434-1.058.773-1.419.994-.178.117-.327.197-.425.256s-.159.082-.159.082l.064-.166c.045-.103.104-.264.193-.456.174-.387.443-.923.799-1.537s.801-1.304 1.316-2.009a5.46 5.46 0 0 1 .175-.238l-.31.006a21.45 21.45 0 0 1-.875.007c-1.153 0-2.229-.046-3.156-.119s-1.702-.172-2.243-.261c-.272-.04-.485-.086-.631-.115l-.224-.044.215-.081c.143-.042.348-.116.612-.196.525-.158 1.281-.361 2.188-.555s1.97-.387 3.111-.541c.285-.045.574-.076.868-.112l.307-.034c-.069-.069-.138-.142-.205-.214-.604-.631-1.137-1.256-1.571-1.816s-.773-1.056-.998-1.416c-.113-.177-.194-.327-.253-.427s-.085-.157-.085-.157a2.57 2.57 0 0 0 .168.065c.106.044.265.104.456.194.389.174.925.442 1.538.797a24.61 24.61 0 0 1 2.009 1.317c.081.058.161.117.24.179l-.007-.314-.006-.88a40.24 40.24 0 0 1 .122-3.151 29.97 29.97 0 0 1 .256-2.245c.042-.27.087-.484.113-.632l.03-.14.018-.081zm-26.607 0l.008.036.039.184c.026.149.071.363.113.632a29.97 29.97 0 0 1 .256 2.245 40.24 40.24 0 0 1 .122 3.151c.006.29-.001.584-.006.88 0 .101-.004.209-.007.314.08-.062.159-.122.24-.179.708-.513 1.396-.959 2.009-1.317s1.149-.624 1.538-.797c.191-.091.35-.151.456-.194s.168-.065.168-.065-.029.058-.085.157-.14.25-.253.427c-.225.36-.562.857-.998 1.416s-.967 1.185-1.571 1.816c-.067.072-.136.145-.205.214.101.013.207.022.307.034l.868.112c1.141.154 2.204.344 3.111.541s1.663.398 2.188.555c.265.079.469.154.612.196l.215.081-.224.044c-.146.028-.359.075-.631.115-.542.089-1.317.19-2.243.261s-2.003.119-3.156.119a21.45 21.45 0 0 1-.875-.007c-.102 0-.204-.003-.31-.006a5.46 5.46 0 0 1 .175.238c.516.705.959 1.397 1.316 2.009s.626 1.149.799 1.537c.089.192.149.353.193.456l.064.166s-.057-.024-.159-.082-.247-.139-.425-.256c-.361-.221-.858-.559-1.419-.994a24.01 24.01 0 0 1-1.814-1.574 4.6 4.6 0 0 1-.214-.204l-.034.306-.109.87a41.34 41.34 0 0 1-.543 3.112c-.195.907-.398 1.663-.556 2.188-.079.263-.152.471-.197.61l-.076.217-.047-.226c-.027-.143-.073-.358-.114-.629a29.54 29.54 0 0 1-.261-2.244c-.073-.928-.119-2.004-.121-3.156-.003-.29.004-.581.008-.878 0-.101.006-.209.006-.313l-.24.176c-.708.515-1.397.962-2.01 1.315a16.51 16.51 0 0 1-1.536.803c-.191.089-.351.15-.455.196-.109.042-.168.059-.168.059l.085-.156c.059-.098.139-.245.253-.425.226-.358.563-.852.999-1.413a23.8 23.8 0 0 1 1.573-1.815c.068-.076.14-.148.211-.22-.103-.013-.211-.02-.314-.035l-.868-.11c-1.141-.158-2.204-.348-3.111-.542s-1.664-.398-2.189-.555c-.264-.074-.471-.153-.611-.197l-.216-.076.224-.048c.147-.024.359-.07.632-.11.542-.089 1.317-.185 2.243-.258.4-.031.833-.057 1.286-.077-.031-.228.046-.461.233-.625.291-.254.735-.225.99.066a.71.71 0 0 1 .17.518l.475-.003c.288-.004.58.003.876.005.104.004.21.006.315.008l-.18-.24c-.512-.71-.959-1.399-1.315-2.009s-.626-1.152-.801-1.538c-.09-.19-.149-.352-.194-.456l-.063-.168s.056.029.157.086.248.14.426.252c.359.225.855.564 1.414.998a24.45 24.45 0 0 1 1.816 1.574c.071.066.144.142.215.21.014-.105.023-.21.035-.317l.111-.868a41.9 41.9 0 0 1 .543-3.11c.196-.908.397-1.664.555-2.191.077-.26.151-.468.195-.61l.077-.214zm220.4 16.064c.353.023.62.33.597.683a.64.64 0 1 1-1.278-.086.64.64 0 0 1 .681-.597zm-413.513.597a.64.64 0 1 1-1.278.086c-.023-.353.244-.66.597-.683a.64.64 0 0 1 .681.597zm386.313-6.022c1.412.095 2.481 1.317 2.387 2.732s-1.318 2.481-2.731 2.386-2.483-1.315-2.389-2.731 1.316-2.481 2.733-2.387zM66.537 61.37c.094 1.416-.974 2.637-2.389 2.731s-2.637-.972-2.731-2.386.975-2.637 2.387-2.732 2.638.975 2.733 2.387zm96.809-.135a2.04 2.04 0 0 1-1.902 2.172c-1.126.076-2.099-.778-2.174-1.901s.776-2.099 1.9-2.174 2.101.776 2.176 1.903zm162.885-1.903c1.124.075 1.975 1.049 1.9 2.174s-1.049 1.977-2.174 1.901a2.04 2.04 0 0 1-1.902-2.172c.075-1.127 1.049-1.977 2.176-1.903zM35.253 61.047a1.2 1.2 0 1 1-2.396.162 1.2 1.2 0 1 1 2.396-.162zm418.175-1.118a1.2 1.2 0 0 1-.161 2.398 1.2 1.2 0 0 1 .161-2.398zm5.481.766c.442.028.779.413.75.857a.81.81 0 0 1-.858.75c-.444-.031-.78-.414-.75-.858s.414-.781.858-.749zm-429.558.749c.031.444-.306.827-.75.858a.81.81 0 0 1-.858-.75c-.029-.444.308-.828.75-.857s.828.305.858.749zm164.163-4.872c1.126.076 1.977 1.048 1.902 2.176s-1.049 1.975-2.176 1.901-1.975-1.051-1.9-2.174a2.04 2.04 0 0 1 2.174-1.903zm102.549 1.903c.075 1.123-.777 2.097-1.9 2.174s-2.1-.778-2.176-1.901.775-2.1 1.902-2.176a2.04 2.04 0 0 1 2.174 1.903zm-141.814.11c.292.259.322.702.066.993a.7.7 0 0 1-.991.066c-.292-.254-.321-.696-.067-.993.257-.287.701-.317.992-.067zm179.897.067c.254.297.225.739-.067.993a.7.7 0 0 1-.991-.066c-.256-.291-.226-.734.066-.993.291-.251.735-.22.992.067zm-145.845-5.702a.64.64 0 0 1 .681.597.64.64 0 1 1-1.278.086.64.64 0 0 1 .597-.683zm110.8 0a.64.64 0 0 1 .597.683.64.64 0 1 1-1.278-.086.64.64 0 0 1 .681-.597zm-20.094-5.186c.93.81 1.024 2.227.21 3.156s-2.226 1.028-3.158.212-1.026-2.228-.211-3.156a2.24 2.24 0 0 1 3.158-.212zm-67.454.212c.816.928.719 2.343-.211 3.156s-2.344.72-3.158-.212-.719-2.346.21-3.156a2.24 2.24 0 0 1 3.158.212zm104.63-2.4a1.2 1.2 0 0 1-1.118 1.279c-.593.04-1.109-.356-1.244-.914l-.023-.122c-.362.022-.667-.245-.691-.597a.64.64 0 0 1 1.105-.481 1.2 1.2 0 0 1 .691-.281c.663-.045 1.235.456 1.28 1.116zm-143.685-1.116a1.2 1.2 0 0 1 .691.281.64.64 0 0 1 1.105.481c-.024.352-.329.619-.683.597h-.008c-.084.622-.632 1.08-1.267 1.037a1.2 1.2 0 0 1-1.118-1.279c.045-.66.618-1.161 1.28-1.116zm79.113-2.951a.7.7 0 0 1 .065.991c-.254.291-.698.322-.99.068s-.322-.701-.067-.994c.255-.288.7-.321.992-.065zm-14.83.065c.255.293.225.737-.067.994s-.735.223-.99-.068a.7.7 0 0 1 .065-.991c.292-.256.737-.223.992.065zm-90.484-1.435a1.51 1.51 0 1 1-3.013.204c-.055-.831.573-1.555 1.405-1.609s1.552.575 1.608 1.406zm196.413-1.406c.832.055 1.46.779 1.405 1.609a1.51 1.51 0 1 1-3.013-.204c.056-.831.777-1.461 1.608-1.406zm-25.392-.377c.353-.022.658.245.682.597a.64.64 0 0 1-1.278.086.64.64 0 0 1 .596-.683zm-147.238 0a.64.64 0 1 1-.086 1.279.64.64 0 0 1-.596-.682c.024-.352.329-.619.682-.597zm136.185-4.183c1.414.094 2.482 1.319 2.388 2.731a2.57 2.57 0 0 1-2.732 2.389c-1.414-.094-2.483-1.319-2.389-2.731a2.57 2.57 0 0 1 2.733-2.388zm-122.4 2.388c.094 1.413-.975 2.637-2.389 2.731a2.57 2.57 0 0 1-2.732-2.389c-.094-1.412.975-2.637 2.388-2.731a2.57 2.57 0 0 1 2.733 2.388zm-51.182.573a.64.64 0 1 1-.085 1.277.64.64 0 0 1-.599-.681c.024-.351.33-.621.684-.596zm222.031 0c.353-.025.66.245.684.596a.64.64 0 1 1-1.281.087.64.64 0 0 1 .597-.683zm-227.264-.168c.03.442-.307.828-.75.857s-.828-.307-.857-.749.307-.828.748-.856.829.304.859.747zm233.356-.747c.441.028.778.411.748.856s-.415.777-.857.749-.78-.415-.75-.857.414-.777.859-.747zm-141.067-2.663c.291.253.321.696.067.99s-.698.321-.992.065a.7.7 0 0 1-.067-.989c.257-.291.7-.322.992-.066zm48.911.066a.7.7 0 0 1-.067.989c-.294.256-.736.225-.992-.065s-.224-.736.067-.99.735-.225.992.066zm51.954-8.617c.293.257.322.696.066.993s-.7.32-.992.067-.321-.7-.066-.993.699-.321.992-.067zm-152.818.067c.255.292.227.736-.066.993s-.736.225-.992-.067-.226-.736.066-.993.738-.224.992.067zm12.941-3.372c.931.815 1.026 2.23.21 3.158s-2.227 1.027-3.157.211a2.24 2.24 0 0 1-.212-3.158c.813-.928 2.228-1.023 3.158-.212zm129.103.212a2.24 2.24 0 0 1-.212 3.158c-.93.816-2.345.72-3.157-.211s-.72-2.344.21-3.158 2.345-.717 3.158.212zm-85.496 1.697c.031.446-.305.827-.749.859s-.826-.305-.856-.749a.8.8 0 1 1 1.605-.109zm39.587-.747a.8.8 0 0 1 .749.856c-.03.444-.412.778-.856.749s-.779-.412-.749-.859a.8.8 0 0 1 .855-.747zm-62.64-4.121c.254.291.224.735-.068.992s-.735.22-.99-.071a.7.7 0 0 1 .067-.987c.291-.256.735-.225.992.066zm85.828-.066a.7.7 0 0 1 .067.987c-.255.292-.7.323-.99.071s-.322-.701-.068-.992.701-.323.992-.066zm120.061-3.009c.444.03.779.415.749.857s-.413.777-.856.749-.78-.411-.75-.857.413-.779.857-.749zm-326.085.749c.03.446-.307.826-.75.857s-.827-.305-.856-.749.305-.827.749-.857.828.306.857.749zm277.904-1.257a.81.81 0 0 1 .752.857.81.81 0 0 1-.859.751c-.444-.031-.777-.415-.747-.859s.412-.778.855-.749zm-229.726.749c.03.444-.304.828-.747.859a.81.81 0 0 1-.859-.751.81.81 0 0 1 .752-.857c.443-.029.826.307.855.749zm81.548-8.998c.03.448-.306.827-.75.858s-.828-.305-.857-.749a.81.81 0 0 1 .75-.861c.443-.029.828.307.857.751zm66.632-.751a.81.81 0 0 1 .75.861c-.03.444-.415.777-.857.749s-.78-.41-.75-.858.414-.78.857-.751zm51.943-1.436a.8.8 0 0 1 .75.855c-.03.444-.413.777-.855.749s-.78-.41-.75-.857.414-.775.856-.747zm-170.519.747c.03.447-.306.828-.75.857s-.826-.305-.855-.749a.8.8 0 0 1 .75-.855c.442-.029.826.302.856.747zm95.464-.672c.03.444-.304.826-.748.858s-.827-.306-.856-.75.304-.826.747-.857.826.307.856.749zm-20.409-.749c.444.031.777.416.747.857s-.412.777-.856.75-.778-.414-.748-.858.412-.778.856-.749zm-162.959.706c.031.444-.305.826-.749.857s-.827-.305-.857-.749a.81.81 0 0 1 .749-.858c.445-.027.827.308.857.75zm346.329-.75a.81.81 0 0 1 .749.858c-.03.444-.414.777-.857.749s-.779-.413-.749-.857.412-.777.857-.75zM247.608 479l.72.003c17.519.169 34.219 6.513 47.549 18.166h0l.507.448c14.475 12.888 23.151 30.604 24.449 49.965h0l.071 1.211c2.024 39.922-28.455 74.352-68.488 77.038h0l-.683.043c-1.138.066-2.273.106-3.406.12l-.679.005c-17.873.059-34.95-6.3-48.526-18.171h0l-.507-.448c-14.476-12.886-23.151-30.602-24.45-49.963h0l-.071-1.211c-2.024-39.922 28.456-74.352 68.488-77.038 1.68-.113 3.357-.17 5.025-.17h0zm-.087 4.283l-.663.004a70.8 70.8 0 0 0-3.99.155h0l-.658.047a68.74 68.74 0 0 0-46.82 23.454h0l-.437.505c-11.875 13.843-17.739 31.46-16.517 49.685h0l.047.658c1.391 18.187 9.704 34.793 23.457 46.815 12.724 11.126 28.715 17.111 45.46 17.111h0l1.179-.01c1.18-.02 2.364-.069 3.55-.149h0l1.14-.086c37.516-3.13 65.818-35.905 63.289-73.605h0l-.047-.658c-1.386-18.187-9.699-34.792-23.453-46.817h0l-.505-.437c-12.661-10.861-28.48-16.691-45.033-16.672zm.543 4.717l1 .008c32.95.518 60.545 26.432 62.789 60.14h0l.051.84c.452 8.395-.72 16.512-3.237 24.037h0l.15-.866a62.13 62.13 0 0 0 .697-14.31h0l-.076-1.014c-2.65-32.015-29.312-56.406-60.879-56.337l-.998.01c-1 .018-2.005.062-3.014.13h0l-1.006.076c-33.121 2.784-58.023 31.832-55.792 65.359h0l.068.914c.396 4.865 1.349 9.556 2.788 14.012h0l-.345-.715c-3.41-7.171-5.554-15.095-6.115-23.513h0l-.062-1.064c-1.766-35.067 24.724-65.204 59.635-67.562a64.43 64.43 0 0 1 4.346-.147h0z" fill-rule="evenodd" fill="#f8eed2"></path></g>
                                            <g id="BodyGraphChart-Rounded">
                                                <path id="channel-back" d="m174.4,80.403h10v15.237h-10v-15.237Zm0,31.039h10v-15.802h-10v15.802Zm20-15.802h10v-15.337h-10v15.337Zm0,15.802h10v-15.802h-10v15.802Zm20-15.802h10v-15.137h-10v15.137Zm0,15.802h10v-15.802h-10v15.802Zm-30,101.601l-.1-38.724-10-17.965.1,56.689h10Zm.1,23.155l-.1-23.454h-10l.1,23.454h10Zm19.9-23.155l-.1-22.955-4.8,1.497-5.2-1.497.1,22.955h10Zm.1,23.354l-.1-23.354h-10l.1,23.354h10Zm19.9-23.354l-.1-53.495-10,16.967.1,36.528h10Zm.1,23.055l-.1-23.354h-10l.1,23.354h10Zm-66.1,29.542v-11.078c-46.5,21.458-83.6,53.994-110.3,96.91l8.5,5.29c24.9-39.822,59.1-70.462,101.8-91.121ZM9.8,486.507l5.2,1.098c1.3-19.562,7.8-76.35,41.6-130.744l-8.5-5.29C12.1,409.558,5.9,468.742,4.9,488.203l4.9-1.697Zm338.4-137.63c-25.9-41.219-61.8-72.857-106.7-94.116v11.078c41.2,20.36,74.2,50.002,98.3,88.327l8.4-5.29Zm38.9,138.03l5.2.1c-1-19.861-7.3-79.744-44.1-138.129l-8.5,5.29c36.3,57.487,41.8,118.168,42.7,134.936l4.7-2.196Zm-54.7-120.065c-22-37.626-52.5-68.266-90.8-91.221l-.1,11.677c33.897,21.067,62.117,50.088,82.2,84.534l8.7-4.99Zm37.2,129.247c-.7-20.859-5.4-74.554-37.2-129.247l-8.7,4.99c34,58.386,36,117.071,36,130.145l9.9-5.888Zm-72.6-81.74l5.1-.399c-2.593-21.235-8.745-41.883-18.2-61.08l-9,4.391c9.209,18.813,15.095,39.071,17.4,59.883l4.7-2.795Zm-13.1-61.48c-10.196-20.559-24.647-38.924-42.4-53.495l-.5,12.675c13.988,12.825,25.481,28.218,33.9,45.211l9-4.391Zm-99.4-14.372h-10v20.46l10-9.98v-10.479Zm0,0l-.1-19.562h-10l.1,19.562h10Zm19.937-9.867h-9.93l-.007,10.766,5.1-1.597,4.903,1.364-.067-10.533Zm.07,0l-.1-9.581h-10l.1,9.581h10Zm-.07,0h-9.93l-.007,10.766,5.1-1.597,4.903,1.364-.067-10.533Zm.07,0l-.1-9.581h-10l.1,9.581h10Zm19.993,9.867h-10v9.781l10,9.98v-19.761Zm0,0l-.1-19.562-10,.1.1,19.462h10Zm47.2,70.661c-5.254-6.059-11.007-11.668-17.2-16.767l-1.3,5.29-3.5,3.693c5.142,4.4,9.955,9.171,14.4,14.272l7.6-6.487Zm11.7,15.569c-3.512-5.583-7.293-10.659-11.7-15.569l-7.6,6.487c4.368,4.858,8.184,10.003,11.6,15.569l7.7-6.487Zm70.8,80.542c-3.16-6.768-6.808-13.047-11.1-19.162l-8.2,5.589c4.154,5.867,7.637,12.017,10.6,18.564l8.7-4.99Zm-11.1-19.162c-4.1-5.888-8.5-11.677-13.1-17.166l-2.6,4.391-4.7,2.395c4.3,5.09,8.4,10.479,12.2,15.969l8.2-5.589Zm-158.6,12.576l-.099-26.334h-9.999l.098,26.334h10Zm-.099-26.334l-.101-36.942-10-9.98.102,46.922h9.999Zm20.099,26.235l-.082-26.235h-10.021l.103,26.235h10Zm20-.1l-.095-26.135h-10l.096,26.235,10-.1Zm-.095-26.135l-.105-45.724-10,9.98.104,35.744h10Zm-19.986,0l-.131-26.438-4.787,1.079-5.2-1.503.097,26.861h10.021Zm19.982-12.379c9.627.007,19.823.153,30.7.389l-1.7-5.389,1.1-4.591c-10.595-.254-20.561-.418-30-.443m-20.001.188c3.236-.076,6.535-.128,9.901-.158l.101,10.051h0c-3.438.036-6.803.094-10.1.176m-19.841-9.232c3.217-.203,6.493-.373,9.835-.512l.008,10.078h0c-3.333.142-6.596.315-9.797.52m-10.208.789c-6.992.638-13.699,1.465-20.198,2.515l-1.6-9.881c7.048-1.164,14.312-2.064,21.887-2.744m-115.287,61.229c25.1-26.947,54.8-42.018,95-48.505l-1.6-9.881c-43.5,6.986-75.2,23.554-102.3,53.196l8.9,5.19Zm182.4,51.699c13.109-2.103,26.045-5.072,38.7-9.082l-3.1-9.481c-11.677,3.716-23.508,6.485-35.6,8.483v10.08Zm74.2-23.953l-2.4-5.19,1-5.489c-4.7,2.795-17.6,9.781-37.2,16.068l3.1,9.481c12.283-3.812,24.171-8.792,35.5-14.871Zm-157.3-253.304v-11.577c-76.2,44.014-108.067,109.65-121.467,157.356l9.584,2.785c12.6-44.912,42.182-106.247,111.882-148.564Zm-122,212.484c.817-21.616,4.225-43.103,10.118-63.92l-9.584-2.785c-5.644,19.893-9.131,40.476-10.333,61.116l9.8,5.589Zm34.908,1.675c6.101,4.308,12.863,8.297,20.192,11.899,19.2,9.382,41.6,15.769,66.8,19.262l.2-10.08c-31.605-4.487-59.057-14.211-79.118-27.641m-16.477.071c-6.542-5.537-12.064-11.489-16.405-17.742-9.9-14.372-13.367-30.077-9.567-44.149l9.467,2.73c-3,11.278,0,23.654,8.4,35.73,4.226,6.112,9.646,11.837,16.105,17.104m74.995-92.756l-.6-5.489,2.2-4.491c-29.5-1.397-54.2,1.896-73.5,9.881-20.1,8.284-32.767,21.123-37.067,37.291l-2.067,7.928.514,12.343s4.639,12.916,4.519,12.736c-.076-.115.32-2.77.944-6.102.356-1.9.843-4.008,1.214-6.019,1.022-5.537,4.46-18.102,4.46-18.102,5.8-21.757,34.982-42.971,99.382-39.977Zm137.9-43.116c-10.196-20.559-24.647-38.924-42.4-53.495l-.5,12.675c13.988,12.825,25.481,28.218,33.9,45.211l9-4.391Zm13.1,61.48l5.1-.399c-2.593-21.235-8.745-41.883-18.2-61.08l-9,4.391c9.209,18.813,15.095,39.071,17.4,59.883l4.7-2.795Zm-138.6,139.327c-12.387-1.998-24.618-4.966-36.6-8.683l-3,9.581c12.982,4.058,26.253,7.128,39.7,9.182l-.1-10.08Zm-36.6-8.683c-18.4-5.888-30.9-12.276-36.5-15.47,0,0,1.6,3.892,1,6.487-.399,1.571-1.076,3.058-2,4.391,11.084,5.675,22.625,10.416,34.5,14.172l3-9.581Zm36.6,82.239c-17.2-5.09-38.4-12.975-57.4-25.45l-5.5,8.284c21.2,13.873,44.6,22.256,63,27.546l-.1-10.38Zm-57.4-25.45c-19-12.675-33-28.245-42-46.309l-8.8,4.791c9.8,19.562,25,36.229,45.3,49.802l5.5-8.284Zm57.5,44.413c-19-5.19-44-13.673-67.1-29.343l-5.6,8.284c25.4,17.166,52.7,26.149,72.7,31.438v-10.38Zm-67.1-29.343c-20.161-13.358-36.688-31.598-48.1-52.896l-8.7,4.89c12.167,22.681,29.754,42.016,51.2,56.29l5.6-8.284Zm66.9,48.106c-32.5-9.282-56.3-19.262-76.3-32.237l-5.496,8.21c21.5,13.873,46.996,24.626,81.996,34.407l-.2-10.38Zm-76.3-32.237c-24-15.569-42.1-35.131-55-59.683l-8.8,4.791c13.7,26.049,32.844,46.615,58.344,63.082l5.456-8.19Zm159.6,4.591c20.5-5.988,43-14.172,63.6-28.045l-5.6-8.284c-18.7,12.575-39.2,20.26-58.1,25.949l.1,10.38Zm108.4-77.249l-8.8-4.791c-9.3,18.065-23.3,33.434-41.6,45.71l5.6,8.284c19.6-13.174,34.7-29.742,44.8-49.204Zm-108.4,115.075c35.1-9.781,61.3-20.959,82.8-34.932l-5.5-8.384c-20.1,12.975-44.7,23.554-77.4,32.936l.1,10.38Zm140.3-97.409l-8.8-4.791c-12.7,24.153-30.5,43.415-54.2,58.885l5.5,8.384c25.2-16.368,44.1-36.828,57.5-62.478Zm-140.4,78.546c20.2-5.389,47.8-14.372,73.3-31.638l-5.6-8.284c-23.2,15.769-48.5,24.352-67.7,29.542v10.38Zm124.1-87.429l-8.8-4.791c-11.357,21.045-27.699,38.999-47.6,52.298l5.6,8.284c21.215-14.211,38.65-33.358,50.8-55.791Z" fill="white"></path>
                                                <g id="_39-55">
                                                    <path id="personality-39" d="m241.5,645.894c19.2-5.19,44.5-13.773,67.7-29.542l5.6,8.284c-25.5,17.266-53.1,26.249-73.3,31.638v-10.38Z" fill="none"></path>
                                                    <path id="design-39" d="m241.4,649.787c19.6-5.29,45.8-13.973,69.9-30.341l1.4,2.096c-24.6,16.667-51.4,25.55-71.2,30.84l-.1-2.595Z" fill="none"></path>
                                                    <path id="personality-55" d="m314.761,624.652l-5.601-8.302c19.901-13.299,36.282-31.25,47.639-52.295l8.8,4.791c-12.15,22.433-29.623,41.596-50.839,55.807Z" fill="#dccb94"></path>
                                                    <path id="design-55" d="m312.673,621.556l-1.409-2.088c20.413-13.613,37.205-32.137,48.836-53.716l2.2,1.198c-11.815,21.942-28.874,40.768-49.627,54.607Z" fill="#dccb94"></path>
                                                </g>
                                                <g id="_41-30">
                                                    <path id="personality-41" d="m241.5,664.758c32.7-9.382,57.3-19.961,77.4-32.936l5.5,8.384c-21.5,13.973-47.7,25.151-82.8,34.932l-.1-10.38Z" fill="none"></path>
                                                    <path id="design-41" d="m241.4,668.65c33.6-9.581,59-20.16,79.6-33.634l1.4,2.096c-20.9,13.573-46.7,24.352-80.8,34.033l-.2-2.495Z" fill="none"></path>
                                                    <path id="personality-30" d="m324.4,640.206l-5.539-8.357c23.7-15.47,41.539-34.758,54.239-58.911l8.8,4.791c-13.4,25.65-32.3,46.11-57.5,62.478Z" fill="#8c732c"></path>
                                                    <path id="design-30" d="m322.362,637.13l-1.391-2.099c24.3-15.769,42.529-35.546,55.429-60.197l2.2,1.198c-13.1,24.951-31.638,45.03-56.238,61.099Z" fill="#8c732c"></path>
                                                </g>
                                                <g id="_49-19">
                                                    <path id="personality-19" d="m241.5,626.932c18.9-5.689,39.4-13.374,58.1-25.949l5.6,8.284c-20.6,13.873-43.1,22.057-63.6,28.045l-.1-10.38Z" fill="none"></path>
                                                    <path id="design-19" d="m241.6,630.824c19.5-5.789,40.7-13.673,60.1-26.748l1.4,2.096c-19.9,13.374-41.7,21.458-61.6,27.247l.1-2.595Z" fill="none"></path>
                                                    <path id="personality-49" d="m305.185,609.306l-5.626-8.306c18.3-12.276,32.341-27.663,41.641-45.727l8.8,4.791c-10.1,19.462-25.215,36.069-44.815,49.243Z" fill="none"></path>
                                                    <path id="design-49" d="m303.072,606.186l-1.413-2.086c18.8-12.675,33.141-28.368,42.741-46.931l2.4.798c-9.8,19.063-24.428,35.244-43.728,48.219Z" fill="none"></path>
                                                </g>
                                                <g id="_18-58">
                                                    <path id="personality-58" d="m158.5,675.337c-35-9.781-60.496-20.534-81.996-34.407l5.496-8.21c20,12.975,43.8,22.955,76.3,32.237l.2,10.38Z" fill="none"></path>
                                                    <path id="design-58" d="m158.5,671.444c-34.1-9.681-58.9-20.061-79.9-33.634l1.4-2.096c20.6,13.274,45,23.554,78.4,33.135l.1,2.595Z" fill="none"></path>
                                                    <path id="personality-18" d="m76.649,640.966c-25.5-16.468-44.749-37.089-58.449-63.138l8.8-4.791c12.9,24.552,31.121,44.146,55.121,59.715l-5.473,8.213Z" fill="none"></path>
                                                    <path id="design-18" d="m78.706,637.879c-24.9-16.068-43.806-36.297-57.206-61.747l2.1-1.297c13.3,25.151,31.903,45.078,56.503,60.947l-1.398,2.098Z" fill="none"></path>
                                                </g>
                                                <g id="_28-38">
                                                    <path id="personality-38" d="m158.5,656.574c-20-5.29-47.3-14.272-72.7-31.438l5.6-8.284c23.1,15.669,48.1,24.153,67.1,29.343v10.38Z" fill="none"></path>
                                                    <path id="design-38" d="m158.4,652.681c-19.7-5.29-46-14.072-70.5-30.64l1.4-2.096c23.9,16.168,49.7,24.851,69.1,30.141v2.595Z" fill="none"></path>
                                                    <path id="personality-28" d="m85.888,625.189c-21.446-14.274-39.121-33.662-51.288-56.343l8.7-4.89c11.412,21.298,28.006,39.574,48.167,52.932l-5.579,8.302Z" fill="none"></path>
                                                    <path id="design-28" d="m87.971,622.089c-20.92-13.934-38.16-32.832-50.071-54.94l2.1-1.297c11.757,21.808,28.762,40.362,49.379,54.142l-1.408,2.096Z" fill="none"></path>
                                                </g>
                                                <g id="_32-54">
                                                    <path id="personality-54" d="m158.5,637.611c-18.4-5.29-41.8-13.673-63-27.546l5.5-8.284c19,12.476,40.2,20.36,57.4,25.45l.1,10.38Z" fill="#dccb94"></path>
                                                    <path id="design-54" d="m158.5,633.718c-17.9-5.29-40.536-13.397-60.936-26.77l1.397-2.099c19.8,13.074,41.839,21.085,59.439,26.275l.1,2.595Z" fill="#dccb94"></path>
                                                    <path id="personality-32" d="m95.545,610.085c-20.3-13.573-35.545-30.261-45.345-49.822l8.8-4.791c9,18.065,23.062,33.659,42.062,46.334l-5.517,8.279Z" fill="#8c732c"></path>
                                                    <path id="design-32" d="m97.614,606.98c-19.9-13.174-34.614-29.452-44.114-48.515l2.2-1.098c9.3,18.564,23.812,34.54,43.312,47.514l-1.398,2.098Z" fill="#dccb94"></path>
                                                </g>
                                                <g id="_50-27">
                                                    <path id="personality-27" d="m158.5,563.755c-13.447-2.054-26.718-5.124-39.7-9.182l3-9.581c11.982,3.717,24.213,6.685,36.6,8.683l.1,10.08Z" fill="none"></path>
                                                    <path id="design-27" d="m158.4,559.863c-13.035-2.013-25.881-4.982-38.478-8.883l.744-2.379c12.343,3.787,24.876,6.673,37.634,8.667l.1,2.595Z" fill="none"></path>
                                                    <path id="personality-50" d="m118.837,554.6c-11.875-3.757-23.453-8.524-34.537-14.199.924-1.333,1.601-2.82,2-4.391.6-2.595-1-6.487-1-6.487,5.6,3.194,18.134,9.577,36.534,15.465l-2.996,9.612Z" fill="none"></path>
                                                    <path id="design-50" d="m119.963,550.99c-11.681-3.635-22.987-8.286-33.863-13.882l.5-2.595c10.979,5.651,22.326,10.382,34.105,14.096l-.742,2.381Z" fill="none"></path>
                                                </g>
                                                <g id="_9-52">
                                                    <rect id="personality-52" x="214.4" y="595.41" width="10" height="14.056" fill="none"></rect>
                                                    <rect id="design-52" x="218.2" y="595.41" width="2.5" height="14.156" fill="none"></rect>
                                                    <rect id="personality-9" x="214.4" y="581.421" width="10" height="14.109" fill="none"></rect>
                                                    <rect id="design-9" x="218.2" y="581.421" width="2.5" height="14.109" fill="none"></rect>
                                                </g>
                                                <g id="_3-60">
                                                    <rect id="personality-60" x="194.4" y="595.41" width="10" height="13.956" fill="none"></rect>
                                                    <rect id="design-60" x="198.1" y="595.41" width="2.5" height="14.056" fill="none"></rect>
                                                    <rect id="personality-3" x="194.4" y="581.421" width="10" height="14.109" fill="#8c732c"></rect>
                                                    <rect id="design-3" x="198.1" y="581.421" width="2.5" height="14.109" fill="#8c732c"></rect>
                                                </g>
                                                <g id="_42-53">
                                                    <rect id="personality-53" x="174.4" y="595.41" width="10" height="14.056" fill="none"></rect>
                                                    <rect id="design-53" x="178.1" y="595.41" width="2.5" height="13.856" fill="none"></rect>
                                                    <rect id="personality-42" x="174.4" y="581.521" width="10" height="14.009" fill="none"></rect>
                                                    <rect id="design-42" x="178.1" y="581.521" width="2.5" height="14.009" fill="none"></rect>
                                                </g>
                                                <g id="_57-20-34-10-G">
                                                    <path id="personality-57" d="m26.7,494.292c1.202-20.64,4.689-41.223,10.333-61.116l9.584,2.785c-5.893,20.817-9.301,42.304-10.118,63.92l-9.8-5.589Z" fill="none"></path>
                                                    <path id="design-57" d="m30.4,496.487c1.071-21.073,4.492-41.961,10.2-62.278l2.4.699c-5.784,20.504-9.206,41.599-10.2,62.877l-2.4-1.297Z" fill="none"></path>
                                                    <path id="personality-34" d="m79.482,494.995c20.061,13.43,47.513,23.153,79.118,27.641l-.2,10.08c-25.2-3.493-47.6-9.881-66.8-19.262-7.329-3.602-14.091-7.59-20.192-11.899m-.403-12.815c-6.459-5.267-11.879-10.993-16.105-17.104-8.4-12.076-11.4-24.452-8.4-35.73l-9.467-2.73c-3.8,14.072-.333,29.777,9.567,44.149,4.341,6.252,9.863,12.205,16.405,17.742" fill="none"></path>
                                                    <path id="design-34" d="m76.18,497.373c20.754,14.177,49.281,24.373,82.12,29.056l.1,2.595c-33.663-4.723-62.94-15.282-84.185-29.984m-6.427-7.968c-6.455-5.342-11.901-11.144-16.188-17.34-9-12.975-11.9-26.448-8.6-38.824l-2.4-.699c-3.4,12.975-.3,27.546,9,41.02,4.338,6.241,9.816,12.095,16.288,17.493" fill="none"></path>
                                                    <path id="personality-10" d="m46.618,435.961l-9.584-2.785c4.3-16.168,16.967-29.008,37.067-37.291,19.3-7.984,44-11.278,73.5-9.881l-2.2,4.491.6,5.489c-64.4-2.994-93.582,18.219-99.382,39.977Z" fill="none"></path>
                                                    <path id="design-10" d="m43,434.908l-2.4-.699c8.1-30.241,47.9-46.708,105.1-44.413l-.3,2.495c-66-2.795-96.2,19.562-102.4,42.617Z" fill="none"></path>
                                                    <path id="personality-20" d="m46.618,435.961l-9.584-2.785c13.4-47.707,45.267-113.342,121.467-157.356v11.577c-69.7,42.317-99.282,103.652-111.882,148.564Z" fill="none"></path>
                                                    <path id="design-20" d="m43,434.908l-2.4-.699c13.1-46.609,44.1-110.783,117.9-154.198v2.894c-72.1,43.016-102.6,106.092-115.5,152.002Z" fill="none"></path>
                                                </g>
                                                <g id="_10-34-G">
                                                    <path id="personality-34-10" d="m79.482,494.995c20.061,13.43,47.513,23.153,79.118,27.641l-.2,10.08c-25.2-3.493-47.6-9.881-66.8-19.262-7.329-3.602-14.091-7.59-20.192-11.899m-.403-12.815c-6.459-5.267-11.879-10.993-16.105-17.104-8.4-12.076-11.4-24.452-8.4-35.73l-9.467-2.73c-3.8,14.072-.333,29.777,9.567,44.149,4.341,6.252,9.863,12.205,16.405,17.742" fill="none"></path>
                                                    <path id="design-34-10" d="m76.18,497.373c20.754,14.177,49.281,24.373,82.12,29.056l.1,2.595c-33.663-4.723-62.94-15.282-84.185-29.984m-6.427-7.968c-6.455-5.342-11.901-11.144-16.188-17.34-9-12.975-11.9-26.448-8.6-38.824l-2.4-.699c-3.4,12.975-.3,27.546,9,41.02,4.338,6.241,9.816,12.095,16.288,17.493" fill="none"></path>
                                                    <path id="personality-10-34" d="m46.618,435.961l-9.584-2.785c4.3-16.168,16.967-29.008,37.067-37.291,19.3-7.984,44-11.278,73.5-9.881l-2.2,4.491.6,5.489c-64.4-2.994-93.582,18.219-99.382,39.977Z" fill="none"></path>
                                                    <path id="design-10-34" d="m43,434.908l-2.4-.699c8.1-30.241,47.9-46.708,105.1-44.413l-.3,2.495c-66-2.795-96.2,19.562-102.4,42.617Z" fill="none"></path>
                                                </g>
                                                <g id="_34-57-G">
                                                    <path id="personality-57-34" d="m26.7,494.292c1.202-20.64,4.689-41.223,10.333-61.116l9.584,2.785c-5.893,20.817-9.301,42.304-10.118,63.92l-9.8-5.589Z" fill="none"></path>
                                                    <path id="design-57-34" d="m30.4,496.487c1.071-21.073,4.492-41.961,10.2-62.278l2.4.699c-5.784,20.504-9.206,41.599-10.2,62.877l-2.4-1.297Z" fill="none"></path>
                                                    <path id="personality-34-57" d="m79.482,494.995c20.061,13.43,47.513,23.153,79.118,27.641l-.2,10.08c-25.2-3.493-47.6-9.881-66.8-19.262-7.329-3.602-14.091-7.59-20.192-11.899m-.403-12.815c-6.459-5.267-11.879-10.993-16.105-17.104-8.4-12.076-11.4-24.452-8.4-35.73l-9.467-2.73c-3.8,14.072-.333,29.777,9.567,44.149,4.341,6.252,9.863,12.205,16.405,17.742" fill="none"></path>
                                                    <path id="design-34-57" d="m76.18,497.373c20.754,14.177,49.281,24.373,82.12,29.056l.1,2.595c-33.663-4.723-62.94-15.282-84.185-29.984m-6.427-7.968c-6.455-5.342-11.901-11.144-16.188-17.34-9-12.975-11.9-26.448-8.6-38.824l-2.4-.699c-3.4,12.975-.3,27.546,9,41.02,4.338,6.241,9.816,12.095,16.288,17.493" fill="none"></path>
                                                </g>
                                                <g id="_10-57-G">
                                                    <path id="personality-57-10" d="m26.7,494.292c1.202-20.64,4.689-41.223,10.333-61.116l9.584,2.785c-5.893,20.817-9.301,42.304-10.118,63.92l-9.8-5.589Z" fill="none"></path>
                                                    <path id="design-57-10" d="m30.4,496.487c1.071-21.073,4.492-41.961,10.2-62.278l2.4.699c-5.784,20.504-9.206,41.599-10.2,62.877l-2.4-1.297Z" fill="none"></path>
                                                    <path id="personality-10-57" d="m46.618,435.961l-9.584-2.785c4.3-16.168,16.967-29.008,37.067-37.291,19.3-7.984,44-11.278,73.5-9.881l-2.2,4.491.6,5.489c-64.4-2.994-93.582,18.219-99.382,39.977Z" fill="none"></path>
                                                    <path id="design-10-57" d="m43,434.908l-2.4-.699c8.1-30.241,47.9-46.708,105.1-44.413l-.3,2.495c-66-2.795-96.2,19.562-102.4,42.617Z" fill="none"></path>
                                                </g>
                                                <g id="_10-20-G">
                                                    <path id="personality-10-20" d="m46.618,435.961l-9.584-2.785c4.3-16.168,16.967-29.008,37.067-37.291,19.3-7.984,44-11.278,73.5-9.881l-2.2,4.491.6,5.489c-64.4-2.994-93.582,18.219-99.382,39.977Z" fill="none"></path>
                                                    <path id="design-10-20" d="m43,434.908l-2.4-.699c8.1-30.241,47.9-46.708,105.1-44.413l-.3,2.495c-66-2.795-96.2,19.562-102.4,42.617Z" fill="none"></path>
                                                </g>
                                                <g id="_20-34-G">
                                                    <path id="personality-34-20" d="m79.482,494.995c20.061,13.43,47.513,23.153,79.118,27.641l-.2,10.08c-25.2-3.493-47.6-9.881-66.8-19.262-7.329-3.602-14.091-7.59-20.192-11.899m-.403-12.815c-6.459-5.267-11.879-10.993-16.105-17.104-8.4-12.076-11.4-24.452-8.4-35.73l-9.467-2.73c-3.8,14.072-.333,29.777,9.567,44.149,4.341,6.252,9.863,12.205,16.405,17.742" fill="none"></path>
                                                    <path id="personality-20-34" d="m46.618,435.961l-9.584-2.785c13.4-47.707,45.267-113.342,121.467-157.356v11.577c-69.7,42.317-99.282,103.652-111.882,148.564Z" fill="none"></path>
                                                    <path id="design-34-20" d="m76.18,497.373c20.754,14.177,49.281,24.373,82.12,29.056l.1,2.595c-33.663-4.723-62.94-15.282-84.185-29.984m-6.427-7.968c-6.455-5.342-11.901-11.144-16.188-17.34-9-12.975-11.9-26.448-8.6-38.824l-2.4-.699c-3.4,12.975-.3,27.546,9,41.02,4.338,6.241,9.816,12.095,16.288,17.493" fill="none"></path>
                                                    <path id="design-20-34" d="m43,434.908l-2.4-.699c13.1-46.609,44.1-110.783,117.9-154.198v2.894c-72.1,43.016-102.6,106.092-115.5,152.002Z" fill="none"></path>
                                                </g>
                                                <g id="_59-6">
                                                    <path id="personality-59" d="m241.6,554.573c12.092-1.999,23.923-4.767,35.6-8.483l3.1,9.481c-12.655,4.01-25.591,6.979-38.7,9.082v-10.08Z" fill="#8c732c"></path>
                                                    <path id="design-59" d="m241.6,558.366c12.497-2.029,24.678-4.948,36.747-8.767l.784,2.403c-12.333,3.896-24.764,6.875-37.531,8.959v-2.595Z" fill="#dccb94"></path>
                                                    <path id="personality-6" d="m280.254,555.6l-3.096-9.484c19.6-6.288,32.542-13.299,37.242-16.094l-1,5.489,2.4,5.19c-11.329,6.079-23.263,11.087-35.546,14.899Z" fill="#8c732c"></path>
                                                    <path id="design-6" d="m279.084,552.017l-.784-2.402c12.16-3.755,24.018-8.734,35.2-14.802l.6,2.495c-11.14,5.986-22.942,10.937-35.016,14.709Z" fill="#dccb94"></path>
                                                </g>
                                                <g id="_44-26">
                                                    <path id="personality-44" d="m50.3,507.765c27.1-29.642,58.871-45.869,102.371-52.856l1.514,9.352c-40.2,6.487-69.886,21.746-94.986,48.694l-8.9-5.19Z" fill="none"></path>
                                                    <path id="design-44" d="m53.6,509.661c26.3-28.644,57.3-44.613,99.6-51.499l.4,2.495c-41.5,6.687-71.9,22.356-97.8,50.301l-2.2-1.297Z" fill="none"></path>
                                                    <path id="personality-26" d="m224.5,449.935c9.439.025,19.405.189,30,.443l-1.1,4.591,1.7,5.389c-10.877-.235-21.074-.382-30.7-.389m-19.999.222c3.297-.082,6.661-.14,10.1-.176h0l-.101-10.051c-3.366.03-6.665.082-9.901.158m-19.893,10.924c3.201-.205,6.465-.378,9.797-.52h0l-.008-10.078c-3.342.139-6.618.309-9.835.512m-10.341.79c-7.478.677-14.653,1.569-21.618,2.72l1.6,9.881c6.499-1.05,13.206-1.876,20.198-2.515" fill="#8c732c"></path>
                                                    <path id="design-26" d="m224.471,453.643c9.148.022,18.794.178,29.029.427.003.434.036.868.1,1.297.058.397.058.801,0,1.198-10.323-.227-20.041-.364-29.247-.371m-9.853-2.518c-3.412.032-6.753.087-10.031.167h0l-.117,2.576c3.313-.084,6.693-.142,10.147-.179m-29.986,1.043c3.235-.209,6.532-.384,9.899-.528l.057.012-.028-2.591c-3.374.144-6.68.319-9.925.529m-10.177.791c-7.316.671-14.335,1.547-21.139,2.666l.4,2.495c6.687-1.084,13.59-1.936,20.791-2.591" fill="#dccb94"></path>
                                                </g>
                                                <g id="_46-29">
                                                    <polygon id="personality-29" points="214.5 498.583 214.404 472.349 224.405 472.349 224.5 498.484 214.5 498.583" fill="#8c732c"></polygon>
                                                    <polygon id="design-29" points="218.2 498.583 218.198 472.349 220.695 472.349 220.695 498.56 218.2 498.583" fill="#8c732c"></polygon>
                                                    <polygon id="personality-46" points="214.404 472.46 214.3 436.629 224.3 426.624 224.405 472.46 214.404 472.46" fill="#dccb94"></polygon>
                                                    <polygon id="design-46" points="218.198 472.46 218.198 433.272 220.695 430.334 220.695 472.46 218.198 472.46" fill="#dccb94"></polygon>
                                                </g>
                                                <g id="_2-14">
                                                    <polygon id="personality-14" points="194.5 498.583 194.397 472.349 204.418 472.349 204.5 498.583 194.5 498.583" fill="#8c732c"></polygon>
                                                    <polygon id="design-14" points="198.109 498.675 198.109 472.349 200.606 472.349 200.606 498.684 198.109 498.675" fill="#dccb94"></polygon>
                                                    <polygon id="personality-2" points="194.397 472.463 194.3 445.488 199.5 446.997 204.287 445.913 204.418 472.463 194.397 472.463" fill="none"></polygon>
                                                    <polygon id="design-2" points="198.109 472.463 198.109 446.744 200.606 446.829 200.606 472.463 198.109 472.463" fill="none"></polygon>
                                                </g>
                                                <g id="_15-5">
                                                    <polygon id="personality-5" points="174.5 498.683 174.402 472.349 184.401 472.349 184.5 498.683 174.5 498.683" fill="none"></polygon>
                                                    <polygon id="design-5" points="178.09 498.687 178.09 472.349 180.613 472.349 180.613 498.687 178.09 498.687" fill="none"></polygon>
                                                    <polygon id="personality-15" points="174.402 472.46 174.3 425.427 184.3 435.431 184.401 472.46 174.402 472.46" fill="none"></polygon>
                                                    <polygon id="design-15" points="178.09 472.46 178.09 428.948 180.613 431.618 180.613 472.46 178.09 472.46" fill="none"></polygon>
                                                </g>
                                                <g id="_40-37">
                                                    <path id="personality-37" d="m345.5,510.26c-2.963-6.547-6.446-12.697-10.6-18.564l8.2-5.589c4.292,6.115,7.94,12.395,11.1,19.162l-8.7,4.99Z" fill="none"></path>
                                                    <path id="design-37" d="m348.8,508.364c-3.007-6.66-6.513-12.857-10.756-18.809l2.002-1.371c4.219,6.021,7.853,12.219,10.954,18.883l-2.2,1.297Z" fill="none"></path>
                                                    <path id="personality-40" d="m334.913,491.728c-3.8-5.489-7.913-10.91-12.213-16l4.7-2.395,2.6-4.391c4.6,5.489,9.03,11.293,13.13,17.181l-8.217,5.606Z" fill="#dccb94"></path>
                                                    <path id="design-40" d="m338.063,489.579c-3.8-5.389-7.663-10.558-11.763-15.548l1.8-1.697c4.236,5.049,8.275,10.42,11.968,15.877l-2.005,1.368Z" fill="#dccb94"></path>
                                                </g>
                                                <g id="_25-51">
                                                    <path id="personality-51" d="m275.7,431.215c-3.416-5.566-7.232-10.711-11.6-15.569l7.6-6.487c4.407,4.911,8.188,9.987,11.7,15.569l-7.7,6.487Z" fill="none"></path>
                                                    <path id="design-51" d="m278.6,428.72c-3.458-5.538-7.256-10.67-11.585-15.56l1.949-1.669c4.382,4.871,8.166,9.977,11.636,15.532l-2,1.697Z" fill="none"></path>
                                                    <path id="personality-25" d="m264.141,415.662c-4.445-5.102-9.298-9.888-14.441-14.288l3.5-3.693,1.3-5.29c6.193,5.099,11.966,10.746,17.219,16.805l-7.579,6.466Z" fill="none"></path>
                                                    <path id="design-25" d="m267.039,413.192c-4.512-5.168-9.426-10.04-14.635-14.508l1.2-2.295c5.466,4.64,10.67,9.748,15.39,15.141l-1.955,1.662Z" fill="none"></path>
                                                </g>
                                                <g id="_33-13">
                                                    <polygon id="personality-13" points="224.5 358.258 214.5 348.278 214.5 338.497 224.5 338.497 224.5 358.258" fill="none"></polygon>
                                                    <polygon id="design-13" points="220.695 354.676 218.2 351.671 218.2 338.497 220.695 338.494 220.695 354.676" fill="none"></polygon>
                                                    <polygon id="personality-33" points="214.5 338.66 214.4 319.036 224.4 318.935 224.5 338.66 214.5 338.66" fill="none"></polygon>
                                                    <polygon id="design-33" points="218.2 338.658 218.198 318.771 220.695 318.771 220.695 338.658 218.2 338.658" fill="none"></polygon>
                                                </g>
                                                <g id="_8-1">
                                                    <polygon id="personality-1" points="204.503 339.162 199.6 337.798 194.5 339.395 194.507 328.63 204.437 328.63 204.503 339.162" fill="none"></polygon>
                                                    <polygon id="design-1" points="198.109 328.63 200.606 328.63 200.606 338.015 198.109 338.004 198.109 328.63" fill="none"></polygon>
                                                    <polygon id="personality-8" points="194.507 328.688 194.407 319.048 204.407 319.048 204.507 328.688 194.507 328.688" fill="none"></polygon>
                                                    <polygon id="design-8" points="198.109 328.688 198.109 319.057 200.606 319.088 200.606 328.688 198.109 328.688" fill="none"></polygon>
                                                </g>
                                                <g id="_31-7">
                                                    <polygon id="personality-7" points="184.5 348.976 174.5 358.957 174.5 338.497 184.5 338.497 184.5 348.976" fill="none"></polygon>
                                                    <polygon id="design-7" points="180.613 352.82 178.09 355.498 178.09 338.494 180.613 338.494 180.613 352.82" fill="none"></polygon>
                                                    <polygon id="personality-31" points="174.5 338.66 174.4 318.935 184.4 318.935 184.5 338.66 174.5 338.66" fill="none"></polygon>
                                                    <polygon id="design-31" points="178.09 338.66 178.1 319.035 180.6 319.035 180.614 338.66 178.09 338.66" fill="none"></polygon>
                                                </g>
                                                <g id="_45-21">
                                                    <path id="personality-21" d="m292.3,417.143c-2.305-20.811-8.191-41.07-17.4-59.883l9-4.391c9.455,19.198,15.607,39.846,18.2,61.08l-5.1.399-4.7,2.795Z" fill="none"></path>
                                                    <path id="design-21" d="m295.8,414.747c-2.478-20.566-8.381-40.54-17.487-59.153l2.292-1.122c9.15,18.717,15.026,38.81,17.595,59.477l-2.4.798Z" fill="none"></path>
                                                    <path id="personality-45" d="m274.933,357.285c-8.419-16.993-19.945-32.412-33.933-45.236l.5-12.675c17.753,14.571,32.226,32.962,42.421,53.521l-8.988,4.391Z" fill="#dccb94"></path>
                                                    <path id="design-45" d="m278.325,355.628c-8.849-18.289-21.361-34.653-36.725-47.971v-3.294c16.349,13.812,29.649,30.919,39.017,50.145l-2.293,1.12Z" fill="#dccb94"></path>
                                                </g>
                                                <g id="_12-22">
                                                    <path id="personality-22" d="m359.7,501.976c0-13.074-2-71.759-36-130.145l8.7-4.99c31.8,54.693,36.5,108.388,37.2,129.247l-9.9,5.888Z" fill="#8c732c"></path>
                                                    <path id="design-22" d="m363.5,499.781c-.3-16.867-3.752-73.414-36.552-129.804l2.184-1.267c32.2,55.391,36.369,110.81,36.869,129.573l-2.5,1.497Z" fill="#8c732c"></path>
                                                    <path id="personality-12" d="m323.756,371.851c-20.083-34.446-48.359-63.486-82.256-84.553l.1-11.677c38.3,22.955,68.851,53.644,90.851,91.27l-8.695,4.96Z" fill="none"></path>
                                                    <path id="design-12" d="m326.971,370.017c-20.8-35.63-49.571-64.954-85.471-87.111v-2.894c36.8,22.456,66.464,52.326,87.664,88.754l-2.193,1.251Z" fill="none"></path>
                                                </g>
                                                <g id="_35-36">
                                                    <path id="personality-36" d="m382.4,489.102c-.9-16.767-6.4-77.448-42.7-134.936l8.5-5.29c36.8,58.386,43.1,118.268,44.1,138.129l-5.2-.1-4.7,2.196Z" fill="none"></path>
                                                    <path id="design-36" d="m386.1,487.205c-1.2-19.262-7.5-78.546-43.1-135.035l2.118-1.355c35.6,56.489,42.182,116.03,43.382,135.891l-2.4.499Z" fill="none"></path>
                                                    <path id="personality-35" d="m339.743,354.26c-24.1-38.325-57.043-68.061-98.243-88.421v-11.078c44.9,21.258,80.838,52.891,106.738,94.11l-8.495,5.389Z" fill="none"></path>
                                                    <path id="design-35" d="m343.011,352.187c-24.8-39.423-58.911-69.88-101.511-90.639v-2.795c43.5,20.959,78.331,51.868,103.631,92.089l-2.12,1.345Z" fill="none"></path>
                                                </g>
                                                <g id="_16-48">
                                                    <path id="personality-48" d="m4.9,488.203c1-19.462,7.2-78.646,43.2-136.632l8.5,5.29c-33.8,54.393-40.3,111.182-41.6,130.744l-5.2-1.098-4.9,1.697Z" fill="none"></path>
                                                    <path id="design-48" d="m8.8,486.806c1.4-20.56,8.3-78.147,42.5-133.239l2.1,1.297c-33.8,54.493-40.7,111.282-42.1,131.842l-2.5.1Z" fill="none"></path>
                                                    <path id="personality-16" d="m56.543,356.894l-8.48-5.272c26.7-42.916,63.837-75.602,110.337-97.06v11.078c-42.7,20.66-76.957,51.432-101.857,91.254Z" fill="none"></path>
                                                    <path id="design-16" d="m53.367,354.919l-2.096-1.303c26-41.818,62.13-73.704,107.33-94.862h0v2.795h0c-44.3,20.859-79.733,52.252-105.233,93.371Z" fill="none"></path>
                                                </g>
                                                <g id="_11-56">
                                                    <polygon id="personality-56" points="214.5 236.098 214.4 212.743 224.4 212.743 224.5 236.098 214.5 236.098" fill="none"></polygon>
                                                    <polygon id="design-56" points="218.2 236.098 218.2 212.743 220.7 212.743 220.8 236.098 218.2 236.098" fill="none"></polygon>
                                                    <polygon id="personality-11" points="214.4 213.197 214.3 176.563 224.3 159.548 224.4 213.197 214.4 213.197" fill="none"></polygon>
                                                    <polygon id="design-11" points="218.2 213.197 218.198 169.564 220.695 165.529 220.7 213.197 218.2 213.197" fill="none"></polygon>
                                                </g>
                                                <g id="_43-23">
                                                    <polygon id="personality-23" points="194.5 236.397 194.4 213.043 204.4 213.043 204.5 236.397 194.5 236.397" fill="none"></polygon>
                                                    <polygon id="design-23" points="198.109 235.999 198.109 213.043 200.606 213.043 200.606 236.016 198.109 235.999" fill="none"></polygon>
                                                    <polygon id="personality-43" points="194.4 213.197 194.3 190.088 199.5 191.595 204.3 190.088 204.4 213.197 194.4 213.197" fill="#dccb94"></polygon>
                                                    <polygon id="design-43" points="198.109 213.197 198.109 191.286 200.606 191.292 200.606 213.197 198.109 213.197" fill="#dccb94"></polygon>
                                                </g>
                                                <g id="_17-62">
                                                    <polygon id="personality-62" points="174.5 236.197 174.4 213.069 184.4 213.069 184.5 236.197 174.5 236.197" fill="none"></polygon>
                                                    <polygon id="design-62" points="178.09 236.113 178.09 213.069 180.613 213.069 180.613 236.134 178.09 236.113" fill="none"></polygon>
                                                    <polygon id="personality-17" points="174.4 213.197 174.3 156.354 184.3 174.368 184.4 213.197 174.4 213.197" fill="none"></polygon>
                                                    <polygon id="design-17" points="178.1 213.197 178.09 163.345 180.613 167.39 180.6 213.197 178.1 213.197" fill="none"></polygon>
                                                </g>
                                                <g id="_63-4">
                                                    <rect id="personality-4" x="214.4" y="95.639" width="10" height="15.802" fill="none"></rect>
                                                    <rect id="design-4" x="218.2" y="95.639" width="2.5" height="15.802" fill="none"></rect>
                                                    <rect id="personality-63" x="214.4" y="80.502" width="10" height="15.276" fill="#8c732c"></rect>
                                                    <rect id="design-63" x="218.2" y="80.303" width="2.5" height="15.475" fill="#8c732c"></rect>
                                                </g>
                                                <g id="_61-24">
                                                    <rect id="personality-24" x="194.4" y="95.639" width="10" height="15.802" fill="none"></rect>
                                                    <rect id="design-24" x="198.1" y="95.639" width="2.5" height="15.802" fill="none"></rect>
                                                    <rect id="personality-61" x="194.4" y="80.303" width="10" height="15.475" fill="none"></rect>
                                                    <polygon id="design-61" points="198.1 80.403 200.6 80.403 200.6 95.778 198.049 95.778 198.1 80.403" fill="none"></polygon>
                                                </g>
                                                <g id="_64-47">
                                                    <rect id="personality-47" x="174.4" y="95.639" width="10" height="15.802" fill="#8c732c"></rect>
                                                    <rect id="design-47" x="178.1" y="95.639" width="2.5" height="15.802" fill="#8c732c"></rect>
                                                    <rect id="personality-64" x="174.4" y="80.403" width="10" height="15.375" fill="none"></rect>
                                                    <polyline id="design-64" points="178.1 85.382 178.1 80.403 180.6 80.403 180.6 95.778 178.1 95.778 178.1 85.382" fill="none"></polyline>
                                                </g>
                                                <path id="ChannelBorders" d="m4.9,488.303c2.014-30.244,8.553-60.016,19.4-88.327,11.4-30.041,27.1-56.889,46.8-79.844,23.62-27.652,52.902-49.654,87.152-65.412m-.124,11.043c-30.442,14.525-57.5,35.255-79.428,60.856-18.9,22.057-34,47.906-45,76.849-10.334,27.008-16.602,55.394-18.6,84.235m367,1.597c-.5-11.278-3.3-46.908-18.9-87.828-11.4-29.742-26.6-55.192-45-76.75-21.283-24.764-47.375-44.966-76.7-59.384m150.5,221.666c-.7-13.474-3.9-48.206-19.2-88.726-11.5-30.041-27.2-56.889-46.8-79.844-23.271-27.148-52.079-49.027-84.5-64.174m118.3,247.647c-.018-9.537-1.024-42.123-14-81.074-8.674-26.403-21.611-51.215-38.3-73.456-18.182-23.87-40.542-44.259-66-60.182m128.191,209.044c-1.025-26.602-5.803-52.928-14.191-78.201-8.991-27.483-22.436-53.309-39.8-76.45-20.236-26.563-45.433-48.965-74.2-65.971m50.8,141.523c-1.395-12.754-4.11-25.33-8.1-37.526-6.5-19.462-19-45.81-43.1-67.468m61,101.701c-1.504-12.591-4.285-24.997-8.3-37.027-7.5-22.356-22.4-53.296-52.3-77.348m-170.206,202.183c20.479,14.441,49.547,26.003,87.106,31.159m-79.044-37.886c19.075,12.763,45.652,22.946,78.944,27.806m-118.3-56.888c-1.908,11.22-3.044,22.558-3.4,33.934m121.7-223.762c-30.17,17.195-56.535,40.316-77.5,67.967-17.364,23.141-30.809,48.967-39.8,76.45-8.03,23.94-12.806,48.847-14.2,74.055m131.5-206.895c-26.846,16.146-50.365,37.249-69.3,62.178-12.822,17.155-23.47,35.827-31.7,55.591h0c17.5-12.875,46.5-21.458,90.1-19.362m-1.5,9.98c-29.3-1.297-54,2.495-71.8,10.978-17,8.084-27.1,20.36-28.4,34.532-2,13.573,8.4,33.135,25.5,46.808l-8.3,6.887c-9.703-7.981-17.522-18-22.9-29.342m134.183-13.943c-49.752,4.621-89.655,18.713-123.783,55.961m124-46.01c-11.364,1.023-22.653,2.757-33.8,5.19-32.958,7.453-58.877,22.031-81.112,45.703m134.912-52.29c-3.3.1-6.6.299-9.8.499m29.9-.998c-3.4,0-6.7.1-10.1.2m50.5.299c-10.212-.198-20.228-.494-30.241-.499m29.741-9.581c-10.3-.2-20.3-.399-29.9-.399m-20,.2c3.3-.1,6.6-.1,9.9-.2m-20,.599c-3.324.098-6.649.291-9.88.486m160.98,58.998c-5.947-13.553-17.298-27.988-22.659-34.364m31.314,29.355c-6.826-14.964-18.794-29.868-24.156-36.21m-88.5,95.812c37.7-6.088,63.2-17.965,74.3-23.953m-74.3,13.873c39.788-6.602,65.247-20.014,72.817-24.388m-229.829,10.314c11.978,6.308,37.305,17.596,74.012,23.255m-73.097-34.063c8.793,4.923,34.251,17.768,72.897,23.983m83.2,73.157c65.2-19.961,88.6-49.004,99.7-71.36m-99.7,81.939c37.8-10.978,85.2-31.139,108.5-77.049m-108.4,85.532c38.1-10.28,87.6-30.54,115.2-81.84m-115.154,92.154c17.377-4.597,40.963-12.076,63.954-25.685,26.1-15.569,46.2-36.229,59.9-61.48m-123.9,95.712c32.4-9.282,56.1-19.262,76.1-32.037,24.2-15.47,42.5-35.031,55.4-59.583m-131.469,101.935c34.781-9.762,60.017-20.226,81.469-34.068,25.7-16.368,45-37.127,58.8-63.076m-331.8-17.665c23.1,45.91,70.4,66.27,108.3,77.348m-99.5-82.239c20.8,41.718,64,60.98,99.5,71.66m-123.8-58.186c13.7,25.45,33.8,46.209,60.1,61.879,22.9,13.673,46.3,21.159,63.7,25.75m-114.982-92.397c27.523,51.436,76.936,71.753,115.082,82.117m-140.302-68.279c13.794,26.161,33.163,46.96,59.002,63.489,21.4,13.673,46.6,24.153,81.3,33.934m-131.499-102.207c12.994,24.761,31.262,44.361,55.599,59.99,20,12.775,43.6,22.755,75.8,31.937m117.2-234.041c-7.065-11.143-15.8-21.14-25.9-29.642m33.7,23.155c-6.9-10.978-17.3-22.656-28.9-32.237m-40-280.85v-31.039m0,155.795v-59.982m0,171.963v-28.826m0,179.132v-62.078m0,172.861v-27.746m10,.159v27.786m0-182.941v71.959m0-179.349v39.123m0-199.509v77.349m0-155.595v30.77m-30.1.169v-31.039m0,155.633v-46.147m0,149.707v-20.56m0,179.448v-53.395m0,164.278v-27.846m10,0v27.713m0-163.253v52.503m0-179.448v19.861m0-148.396v45.698m0-155.795v31.039m-30,0v-30.844m0,155.599v-79.843m0,203.102v-40.421m0,179.349v-72.957m0,183.94v-27.846m10,.1v27.845m0-173.951v63.068m0-179.548v30.44m0-175.157v61.879m0-155.795v30.84" fill="none" stroke="#8c732c" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <g id="Centers">
                                                    <g id="RootCenter">
                                                        <path id="root-center" d="m241.5,619.446v62.877c-.016,5.505-4.484,9.964-10,9.98h-63c-5.516-.016-9.984-4.475-10-9.98v-62.877c.016-5.505,4.484-9.964,10-9.98h63c5.516.016,9.984,4.475,10,9.98Z" fill="#e5d9b3" stroke="black"></path>
                                                        <path id="_60" d="m198,612.46h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(193.5 623.449)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">60</tspan>
                                                        </text>
                                                        <path id="_58" d="m168,667.352h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(163.5 678.342)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">58</tspan>
                                                        </text>
                                                        <path id="_41" d="m229,667.352h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(224.5 678.342)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">41</tspan>
                                                        </text>
                                                        <path id="_39" d="m229,647.392h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(224.5 658.382)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">39</tspan>
                                                        </text>
                                                        <path id="_19" d="m229,627.431h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(224.5 638.422)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">19</tspan>
                                                        </text>
                                                        <path id="_52" d="m218,612.46h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(213.5 623.449)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">52</tspan>
                                                        </text>
                                                        <path id="_53" d="m178,612.46h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(173.5 623.449)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">53</tspan>
                                                        </text>
                                                        <path id="_54" d="m168,627.431h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(163.5 638.422)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">54</tspan>
                                                        </text>
                                                        <path id="_38" d="m168,647.392h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(163.5 658.382)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">38</tspan>
                                                        </text>
                                                    </g>
                                                    <g id="SolarPlexusCenter">
                                                        <path id="solar-plexus-center" d="m384.5,488.004l-65.9,37.626c-4.759,2.661-6.481,8.681-3.815,13.431l.115.242h0c.93,1.594,2.279,2.906,3.9,3.793l65.9,36.229c4.748,2.682,10.775,1.014,13.462-3.725.013-.022.025-.045.038-.067.87-1.482,1.32-3.173,1.3-4.89v-73.955c-.016-5.505-4.484-9.964-10-9.98-1.747.028-3.461.473-5,1.298Z" fill="#e5d9b3" stroke="black"></path>
                                                        <path id="_36" d="m386,490.699h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(381.5 501.69)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">36</tspan>
                                                        </text>
                                                        <path id="_22" d="m368,501.677h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(363.5 512.668)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">22</tspan>
                                                        </text>
                                                        <path id="_37" d="m351,510.659h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(346.5 521.65)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">37</tspan>
                                                        </text>
                                                        <path id="_6" d="m325,526.628h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(323.5 537.617)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">6</tspan>
                                                        </text>
                                                        <path id="_49" d="m347,540.601h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(342.5 551.591)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">49</tspan>
                                                        </text>
                                                        <path id="_55" d="m365,550.581h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(360.5 561.571)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">55</tspan>
                                                        </text>
                                                        <path id="_30" d="m383,559.564h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(378.5 570.553)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">30</tspan>
                                                        </text>
                                                    </g>
                                                    <g id="SpleenCenter">
                                                        <path id="splenic-center" d="m15.5,488.004l65.9,37.626c4.759,2.661,6.492,8.688,3.826,13.438l-.126.235c-.93,1.594-2.279,2.906-3.9,3.793l-65.8,36.229c-4.834,2.66-10.913.92-13.6-3.892h0c-.87-1.482-1.32-3.173-1.3-4.89v-73.855c.016-5.505,4.484-9.964,10-9.98,1.747.028,3.461.473,5,1.298Z" fill="#e5d9b3" stroke="black"></path>
                                                        <path id="_50" d="m73,526.628h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(68.5 537.617)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">50</tspan>
                                                        </text>
                                                        <path id="_32" d="m48,541.599h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(43.5 552.59)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">32</tspan>
                                                        </text>
                                                        <path id="_28" d="m31,550.581h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(26.5 561.571)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">28</tspan>
                                                        </text>
                                                        <path id="_18" d="m14,559.564h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(9.5 570.553)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">18</tspan>
                                                        </text>
                                                        <path id="_48" d="m10,490.699h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(5.5 501.69)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">48</tspan>
                                                        </text>
                                                        <path id="_57" d="m28,500.679h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(23.5 511.671)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">57</tspan>
                                                        </text>
                                                        <path id="_44" d="m46,511.658h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(41.5 522.649)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">44</tspan>
                                                        </text>
                                                    </g>
                                                    <g id="SacralCenter">
                                                        <path id="sacral-center" d="m241.5,508.663v62.877c-.016,5.505-4.484,9.964-10,9.98h-63c-5.516-.016-9.984-4.475-10-9.98v-62.877c.016-5.505,4.484-9.964,10-9.98h63c5.516.016,9.984,4.475,10,9.98Z" fill="#b97431" stroke="black"></path>
                                                        <path id="_14" d="m198,500.679h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(193.006 511.671)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">14</tspan>
                                                        </text>
                                                        <path id="_29" d="m218,500.679h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(213.5 511.671)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">29</tspan>
                                                        </text>
                                                        <path id="_5" d="m178,500.679h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(176.319 511.671)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">5</tspan>
                                                        </text>
                                                        <path id="_34" d="m168,520.64h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(163.5 531.63)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">34</tspan>
                                                        </text>
                                                        <path id="_27" d="m168,549.583h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(163.5 560.574)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">27</tspan>
                                                        </text>
                                                        <path id="_42" d="m178,564.554h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(173.5 575.544)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">42</tspan>
                                                        </text>
                                                        <path id="_9" d="m218,564.554h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(216.5 575.544)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">9</tspan>
                                                        </text>
                                                        <path id="_3" d="m198,564.554h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(196.5 575.544)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">3</tspan>
                                                        </text>
                                                        <path id="_59" d="m229,549.583h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(224.5 560.574)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">59</tspan>
                                                        </text>
                                                    </g>
                                                    <g id="HeartCenter">
                                                        <path id="heart-center" d="m293.6,416.244l-36.6,31.039c-4.196,3.566-4.701,9.852-1.128,14.04,1.474,1.728,3.495,2.901,5.728,3.326l56.9,10.978c5.41,1.093,10.687-2.389,11.8-7.785.436-2.127.155-4.337-.8-6.288l-20.3-42.018c-2.34-4.948-8.256-7.067-13.214-4.732-.029.014-1.715.881-2.386,1.438Z" fill="#ffffff" stroke="black"></path>
                                                        <path id="_21" d="m298,418.839h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(293.5 429.829)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">21</tspan>
                                                        </text>
                                                        <path id="_26" d="m265,446.785h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(260.5 457.776)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">26</tspan>
                                                        </text>
                                                        <path id="_51" d="m284,430.816h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(279.5 441.806)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">51</tspan>
                                                        </text>
                                                        <path id="_40" d="m316,457.763h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(311.5 468.753)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">40</tspan>
                                                        </text>
                                                    </g>
                                                    <g id="GCenter">
                                                        <path id="g-center" d="m207.1,340.992l44.5,44.413c3.894,3.877,3.901,10.17.016,14.056-.005.005-.011.011-.016.016l-44.5,44.413c-3.885,3.886-10.19,3.893-14.084.016-.005-.005-.011-.011-.016-.016l-44.6-44.413c-3.894-3.877-3.901-10.17-.016-14.056.005-.005.011-.011.016-.016l44.5-44.413c3.818-3.898,10.072-3.987,14-.2h0l.2.2Z" fill="#b99831" stroke="black"></path>
                                                        <path id="_1" d="m198,341.99h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(196.01 353.11)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">1</tspan>
                                                        </text>
                                                        <path id="_7" d="m181,357.959h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(179.5 368.948)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">7</tspan>
                                                        </text>
                                                        <path id="_13" d="m215,357.959h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(209.5 368.948)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">13</tspan>
                                                        </text>
                                                        <path id="_25" d="m240,383.908h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(235.5 394.899)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">25</tspan>
                                                        </text>
                                                        <path id="_10" d="m156,383.908h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(151.5 394.899)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">10</tspan>
                                                        </text>
                                                        <path id="_15" d="m180,409.857h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(174.664 420.923)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">15</tspan>
                                                        </text>
                                                        <path id="_2" d="m198,427.822h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(196.5 438.813)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">2</tspan>
                                                        </text>
                                                        <path id="_46" d="m215,409.857h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(210.5 420.848)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">46</tspan>
                                                        </text>
                                                    </g>
                                                    <g id="ThroatCenter">
                                                        <path id="throat-center" d="m241.5,246.178v62.877c-.016,5.505-4.484,9.964-10,9.98h-63c-5.516-.016-9.984-4.475-10-9.98v-62.877c.016-5.505,4.484-9.964,10-9.98h63c5.516.016,9.984,4.475,10,9.98Z" fill="#ffffff" stroke="black"></path>
                                                        <path id="_8" d="m198,302.068h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(196.316 313.095)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">8</tspan>
                                                        </text>
                                                        <path id="_33" d="m218,302.068h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(213.5 313.059)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">33</tspan>
                                                        </text>
                                                        <path id="_31" d="m178,302.068h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(173.5 313.059)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">31</tspan>
                                                        </text>
                                                        <path id="_20" d="m169,270.131h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(164.5 281.122)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">20</tspan>
                                                        </text>
                                                        <path id="_16" d="m169,253.164h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(163.99 264.154)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">16</tspan>
                                                        </text>
                                                        <path id="_62" d="m178,238.193h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(173.5 249.184)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">62</tspan>
                                                        </text>
                                                        <path id="_23" d="m198,238.193h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(193.5 249.184)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">23</tspan>
                                                        </text>
                                                        <path id="_56" d="m218,238.193h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(213.5 249.184)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">56</tspan>
                                                        </text>
                                                        <path id="_35" d="m228,253.164h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(223.5 264.154)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">35</tspan>
                                                        </text>
                                                        <path id="_12" d="m228,270.131h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(223.5 281.122)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">12</tspan>
                                                        </text>
                                                        <path id="_45" d="m229,288.096h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(224.5 299.086)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">45</tspan>
                                                        </text>
                                                    </g>
                                                    <g id="AjnaCenter">
                                                        <path id="ajna-center" d="m243.2,126.313l-34.6,59.982c-2.75,4.792-8.871,6.453-13.673,3.708-1.615-.923-2.94-2.276-3.827-3.908l-33.4-59.883c-2.585-4.748-.897-10.687,3.8-13.374h0c.1,0,.1-.1.2-.1,1.485-.869,3.179-1.317,4.9-1.297h67.9c5.516.016,9.984,4.475,10,9.98-.028,1.711-.475,3.39-1.3,4.89Z" fill="#ffffff" stroke="black"></path>
                                                        <path id="_24" d="m198,113.438h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(193.5 124.428)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">24</tspan>
                                                        </text>
                                                        <path id="_47" d="m178,113.438h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(173.5 124.428)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">47</tspan>
                                                        </text>
                                                        <path id="_4" d="m218,113.438h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(215.9 124.428)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">4</tspan>
                                                        </text>
                                                        <path id="_17" d="m184,145.375h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(178.5 156.366)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">17</tspan>
                                                        </text>
                                                        <path id="_43" d="m198,172.322h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(193.5 183.314)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">43</tspan>
                                                        </text>
                                                        <path id="_11" d="m214,145.375h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(209.5 156.366)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">11</tspan>
                                                        </text>
                                                    </g>
                                                    <g id="HeadCenter">
                                                        <path id="head-center" d="m243.2,65.631L208.6,5.649c-2.75-4.792-8.871-6.453-13.673-3.708-1.615.923-2.94,2.276-3.827,3.908l-33.4,59.883c-2.585,4.748-.897,10.687,3.8,13.374h0c.1,0,.1.1.2.1,1.475.792,3.125,1.204,4.8,1.198h67.9c5.445.132,9.966-4.165,10.098-9.599,0-.027.001-.055.002-.082h0v-.2c-.028-1.711-.475-3.39-1.3-4.89Z" fill="#ffffff" stroke="black"></path>
                                                        <path id="_64" d="m178,62.538h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(173.5 73.528)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">64</tspan>
                                                        </text>
                                                        <path id="_61" d="m198,62.538h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="transparent" fill-rule="evenodd"></path>
                                                        <text transform="translate(193.5 73.528)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="black">
                                                            <tspan x="0" y="0">61</tspan>
                                                        </text>
                                                        <path id="_63" d="m218,62.538h3c4.13.03,7.47,3.364,7.5,7.485h0c-.03,4.122-3.37,7.456-7.5,7.485h-3c-4.13-.03-7.47-3.364-7.5-7.485h0c.03-4.122,3.37-7.456,7.5-7.485Z" fill="#444444" fill-rule="evenodd"></path>
                                                        <text transform="translate(213.5 73.528)" font-family="Roboto-Regular, Roboto" font-size="10.978" fill="#f3f6f4">
                                                            <tspan x="0" y="0">63</tspan>
                                                        </text>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                        </div>
                                        </figure>
                                </div>
                                </div>
                                </li>
                
                                <li>
                                    <div class="bgec-features-list-item golden-box bgec-reverse-details">
                                        <h3>Personality</h3>
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>22.1</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M10 22.6c4.4 1.3 8.7-1.1 10.9-4.9 2.5-4.2 2.3-9.8-.8-13.6C17.4.9 12.8-.4 8.8.5 4.4 1.5 1.1 5.4.4 9.8c-.8 5.2 2 10.9 7.3 12.3.8.2 1-.9.3-1.2C2.6 18.9.8 13 2.4 7.8 3.9 2.9 9 .5 13.8 1.6c5.4 1.2 8.6 6.5 7.4 11.9-1.1 5.1-5.7 9.3-11.1 8.4-.3 0-.5.6-.1.7h0zm1.4-9.7c.8.2 1.6-.5 1.8-1.2.1-.5 0-1-.2-1.4-.5-.8-1.7-.9-2.4-.3-.6.5-.7 1.3-.4 2 .2.4.5.7.9.8"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>47.1</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M5.4 20.1c3.1 3.1 7.8 3 11.5.8 3.9-2.3 6.3-6.9 5.5-11.5-.7-4.2-4.2-7.5-8.2-8.6-4.1-1.1-8.5.7-11 4.1-3 4-3.3 10.1.5 13.7.5.5 1.3-.3.8-.8-3.6-4-2.6-9.7 1-13.4C9 .7 14.6 1 18.3 4.3c4 3.7 4 9.7.3 13.7-3.3 3.6-8.8 4.7-12.9 1.7-.2-.2-.6.2-.3.4h0z"></path>
                                                        <path d="M11.9 20.7c.5-6.3.4-12.8.3-19.2 0-.9-1.5-.9-1.5 0 .2 6.4.1 12.8.5 19.2a.35.35 0 0 0 .7 0h0z"></path>
                                                        <path d="M2.7 11.5c6.2.5 12.5.5 18.7.4.9 0 .9-1.5 0-1.5-6.2.2-12.5 0-18.7.4-.3.1-.3.6 0 .7h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>29.5</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M16.4 19.2c.7-1.3 1.6-2.8 3.3-2.4.6.2 1.2.6 1.5 1.2 1 1.9-.5 3.5-2.5 3.4-2.9-.2-3.8-2.9-2.9-5.4.7-1.7 1.9-3.2 2.8-4.8 1.4-2.7 2.1-6 0-8.5-1.7-2-4.5-2.6-7-2.6-1 0-1 1.5 0 1.5 1.9 0 4.5.8 5.8 2.2 2.1 2.5 1.2 5.3-.4 7.7-2.1 3-5 8.5-.1 10.7 1.7.8 3.8.8 5.1-.8.9-1 1.2-2.4.7-3.7-.5-1.4-1.7-2-3.1-1.9-1.9.1-3.1 1.4-3.2 3.3-.1.2 0 .2 0 .1h0z"></path>
                                                        <path d="M6.7 19.2c-.2-1.8-1.4-3.2-3.2-3.3-1.4-.1-2.6.6-3.1 1.9s-.1 2.7.7 3.7c1.3 1.5 3.4 1.5 5.1.8 4.9-2.1 2-7.7-.1-10.7-1.7-2.4-2.6-5.2-.4-7.7 1.2-1.4 3.9-2.3 5.8-2.2 1 0 1-1.5 0-1.5-2.5 0-5.3.5-7 2.5-2.2 2.5-1.5 5.9-.1 8.6.8 1.5 1.9 2.9 2.7 4.5 1.1 2.4.6 5.1-2.3 5.7-2 .4-3.9-1-3-3.1.3-.7.9-1.3 1.6-1.4 1.7-.4 2.6 1.1 3.3 2.4-.1-.1 0-.1 0-.2h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>30.5</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M6.6 3.8C5.9 5.1 5 6.6 3.3 6.1c-.7-.1-1.2-.6-1.5-1.2-1-1.9.5-3.5 2.5-3.4 2.9.2 3.8 2.9 2.9 5.4-.7 1.7-1.9 3.2-2.8 4.8-1.4 2.7-2.1 6 0 8.5 1.7 2 4.5 2.6 7 2.6 1 0 1-1.5 0-1.5-1.9 0-4.5-.8-5.8-2.2-2.1-2.5-1.2-5.3.4-7.7 2.1-3 5-8.5.1-10.7-1.6-.7-3.7-.7-5 .8-.9 1-1.2 2.4-.7 3.7.5 1.4 1.7 2 3.1 1.9C5.4 7 6.6 5.7 6.8 3.8c0-.1-.2-.1-.2 0h0z"></path>
                                                        <path d="M16.3 3.8c.2 1.8 1.4 3.2 3.2 3.3 1.4.1 2.6-.6 3.1-1.9s.1-2.7-.7-3.7C20.6 0 18.5 0 16.8.7c-4.9 2.1-2 7.7.1 10.7 1.7 2.4 2.6 5.2.4 7.7-1.2 1.4-3.9 2.3-5.8 2.2-1 0-1 1.5 0 1.5 2.5 0 5.3-.5 7-2.5 2.2-2.5 1.5-5.9.1-8.6-.8-1.5-1.9-2.9-2.7-4.5-1.1-2.4-.6-5.1 2.3-5.7 2-.4 3.9 1 3 3.1-.3.7-.9 1.3-1.6 1.4-1.7.4-2.6-1.1-3.3-2.4.1.1 0 .1 0 .2h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon">
                                                <svg width="8px" height="8px" viewBox="0 0 8 8" version="1.1" xmlns="http://www.w3.org/2000/svg" style="color: rgb(0, 0, 0);">
                                                    <g id="Group-5">
                                                        <path d="M6.98532 4.24265L3.74267 9.53674e-06L0.500035 4.24265L6.98532 4.24265Z" id="Rectangle" fill="currentColor" fill-rule="evenodd" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </i>
                                            <p>14.4</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23">
                                                        <path d="m2.8,1.89999c4.7,1.2,9.2,4.8,9.1,10.1,0,2.1-.7,4.1-2.2,5.7-1.6,1.6-3.5,2.2-5.5,2.9-.2.1-.2.3,0,.3,5,.1,8.7-4.1,8.8-8.9C13,6.79999,8.3,1.09999,2.8,1.39999c-.2,0-.3.4,0,.5h0Z" style="fill: currentColor;"></path>
                                                        <path d="m2.9,1.89999c6.4-2.3,15.9.9,16,8.7.1,4.3-2.3,7.7-6.1,9.5-3.2,1.5-6.6,1.6-10,1.6-.2,0-.2.3,0,.3,5.5,1.8,13.3-.7,16-5.9,1.6-3,1.7-6.9.2-9.9-1.4-2.8-4.2-4.5-7.1-5.3C9-.00001,5.4-.10001,2.7,1.49999c-.2.1-.1.5.2.4h0Z" style="fill: currentColor;"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>63.3</p><span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M4.8.5c.9 1.8 3.4 2.4 5.2 2.6 2.6.3 5.6.1 7.6-1.9.6-.5-.1-1.3-.8-1-1 .4-1.9 1.2-3 1.5-1.2.4-2.6.4-3.9.4-1-.1-2-.3-3-.8-.7-.3-1.3-.8-2-1-.1 0-.2.1-.1.2h0zm6.4 22c.2-1.2.2-2.5.3-3.8s.2-2.6 0-3.9c-.1-.5-1-.5-1 0-.2 1.3-.1 2.6 0 3.9 0 1.3 0 2.5.2 3.8.1.3.5.3.5 0h0z"></path>
                                                        <path d="M8 19.3c1 .2 2 .2 3 .2s2 .1 3-.1c.3-.1.3-.6 0-.6-1-.1-2-.1-3 0-1 0-2 0-3 .3-.1-.1-.1.2 0 .2h0zm-.7-5.4c2.4 2.6 6.3 2 8.7-.4 2.6-2.7 2.5-6.9-.2-9.4-2.5-2.3-6.2-2.5-8.9-.3-2.8 2.1-3.3 6.7-.6 9.2.5.5 1.2-.2.8-.8-1.9-2.4-1.5-5.5.7-7.6 2.1-2 5.3-1.6 7.3.4C20 9.8 13 17.1 7.7 13.4c-.3-.2-.6.2-.4.5h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>3.6</p><span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M11.9 22.6c.2-1.3.2-2.5.3-3.8.1-1.4.3-2.8.1-4.2-.1-.5-1-.8-1.1-.1-.2 1.4-.1 2.8 0 4.1l.2 4.1c.1.1.5.1.5-.1h0z"></path>
                                                        <path d="M8.7 19.1c1 .2 2 .2 3 .2s2 .1 3-.1c.3-.1.3-.6 0-.6-1-.1-2-.1-3 0-1 0-2 0-3 .3-.2-.1-.2.2 0 .2h0zm-1.4-5.9c2.6 2.8 7 2.1 9.6-.5 2.8-2.8 2.8-7.3 0-10.2-2.8-2.7-7-3-10.1-.5-3 2.5-3.5 7.5-.6 10.2.5.6 1.2-.2.8-.7-2.3-2.8-1.6-6.4.9-8.7 2.4-2.3 6.3-1.5 8.4.8 5.1 5.5-2.8 13.3-8.6 9.2-.3-.2-.6.2-.4.4h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>59.2</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M20.7 1l-4 3.9c-1.2 1.2-2.6 2.4-3.5 3.8-.3.5.3.9.7.6 1.4-1.1 2.5-2.6 3.6-4L21 1.4c.3-.3-.1-.6-.3-.4h0z"></path>
                                                        <path d="M20.7.9c-.6.4-.7 1.3-.9 1.9-.3.8-.9 2.2-.4 3a.57.57 0 0 0 1 0c.4-.8.3-1.9.5-2.7.1-.6.4-1.3.3-1.9 0-.2-.3-.4-.5-.3h0z"></path>
                                                        <path d="M20.9.9c-.6-.1-1.5.3-2.2.4l-2.3.3c-.5.1-.5.9 0 1 .8.2 1.8 0 2.6-.2.6-.1 1.9-.3 2.1-1.1.1-.1 0-.4-.2-.4h0zM5.5 20.5c2.6 2.8 7.1 2.1 9.6-.5 2.8-2.8 2.8-7.4 0-10.2S8 6.7 4.9 9.3c-3 2.5-3.5 7.5-.6 10.3.5.5 1.2-.2.8-.8-2.3-2.8-1.6-6.4 1-8.7 2.4-2.3 6.3-1.5 8.4.8 5.1 5.5-2.8 13.4-8.6 9.2-.4-.3-.7.2-.4.4h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>59.4</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M19 14.1c-2.5-.3-4.9-.3-7.4-.4-1.3 0-2.7-.1-4-.1-.9 0-1.9-.2-2.8.2-.5.2-.3 1 .1 1.1.8.3 2 .1 2.8.1l4.1-.1 7.2-.3c.4.1.4-.4 0-.5h0z"></path>
                                                        <path d="M14.8 22.6c.3-2 .3-4 .5-6 .1-1.1.1-2.3.1-3.4 0-.8.2-1.6-.1-2.3-.2-.4-.9-.4-1.1 0-.3.6-.2 1.3-.2 2.1v3.4l.2 6.2c0 .2.5.4.6 0h0zm-9.7-8.3c4.7 0 10.8-5.5 9.1-10.5C12.8 0 7-1 4.9 2.7c-.2.3.2.6.5.4 2.6-2.5 7.2-2 7.7 2.1.5 4.4-4.7 7.2-8.1 8.7-.3.1-.2.4.1.4h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon">
                                                <svg width="8px" height="8px" viewBox="0 0 8 8" version="1.1" xmlns="http://www.w3.org/2000/svg" style="color: rgb(0, 0, 0);">
                                                    <g id="Group-4">
                                                        <path d="M6.98532 3.24264L3.74268 7.48528L0.500035 3.24264L6.98532 3.24264Z" id="Rectangle" fill="currentColor" fill-rule="evenodd" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </i>
                                            <p>6.2</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M7.9.5c0-.3-.4-.3-.5 0-.5 3.9-.4 16.6-.4 19 0 .8.6.9.7 0 0-.1.7-15.1.2-19z"></path>
                                                        <path d="M4.2 5.5c1.1.2 2.2.2 3.4.2 1.1 0 2.3.1 3.4-.1.4-.1.2-.6-.1-.6-1.2-.1-2.4 0-3.6 0-1 0-2.1 0-3.1.3 0 0-.1.1 0 .2h0zm3.5 6.4c1.3-2.1 4-3.4 6.4-2.3 3.3 1.5.9 5.5-.3 7.6-.9 1.6-1.5 3.1 0 4.6 1.7 1.7 3.8.9 4.8-1.1.2-.3-.3-.7-.5-.4-.7.8-1.5 1.8-2.7 1.3-.5-.2-1.1-.7-1.3-1.3-.3-1.2.9-2.5 1.5-3.4 1.2-2 2.4-4.8.9-7-2.1-3.3-8.6-2.2-9.2 1.8-.1.3.2.5.4.2h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>14.2</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M11.8 16.2c.6-4.8.6-9.8.5-14.6 0-1-1.6-1-1.5 0 .2 4.8 0 9.8.4 14.6 0 .4.5.4.6 0h0zM1.2.7c3.5 1.8 6.4 4.4 6.5 8.6.1 4.3-2.9 7.4-6.7 8.8-.3.1-.3.7.1.7 4.5-.5 8-4.9 8.1-9.3C9.3 5.2 5.9.3 1.4.2c-.3 0-.4.4-.2.5h0zM21.6.2c-4.5.2-7.9 5.1-7.8 9.3.1 4.4 3.6 8.8 8.1 9.3.4 0 .4-.6.1-.7-3.8-1.4-6.8-4.5-6.7-8.8.1-4.2 3-6.9 6.5-8.6.2-.1.1-.5-.2-.5h0z"></path>
                                                        <path d="M5.1 9c3.6 2.3 10 2.7 13.2-.4.4-.3 0-1-.5-.9-2.1.7-3.9 1.6-6.1 1.7s-4.2-.5-6.4-1c-.3-.1-.5.4-.2.6h0zm4.8 13.1c1 1.2 2.7.9 3.7-.1 1.1-1.2 1.1-3-.1-4.1-2.3-2.1-6 .3-4.7 3.2.2.4.8.1.7-.3-.2-1-.1-1.8.7-2.4.7-.6 1.6-.7 2.4-.2a1.97 1.97 0 0 1 .6 3c-.7 1-2 1.1-3.1.6-.1-.2-.3.1-.2.3h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon">
                                                <svg width="8px" height="8px" viewBox="0 0 8 8" version="1.1" xmlns="http://www.w3.org/2000/svg" style="color: rgb(0, 0, 0);">
                                                    <g id="Group-5">
                                                        <path d="M6.98532 4.24265L3.74267 9.53674e-06L0.500035 4.24265L6.98532 4.24265Z" id="Rectangle" fill="currentColor" fill-rule="evenodd" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </i>
                                            <p>26.6</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M10.9.9c-.4 3.7-.2 7.6-.2 11.3l.1 10c0 .8 1.3.8 1.3 0-.3-7 .2-14.2-.6-21.3 0-.4-.6-.4-.6 0h0z"></path>
                                                        <path d="M4 5.8c0 2.5.4 5 2.1 7 1.3 1.5 3.5 3 5.6 2.6.6-.1.5-1 0-1.1-2.1-.6-3.8-.9-5.1-2.8C5.4 9.8 5 7.7 4.7 5.7c-.1-.4-.7-.3-.7.1h0z"></path>
                                                        <path d="M2.9 7.9c.5.1.9-.4 1.1-.8.3-.4.5-1 .6-1.5 0-.3-.5-.5-.6-.2-.3.5-.4.9-.6 1.4-.2.3-.6.6-.6 1 0 .1.1.1.1.1h0z"></path>
                                                        <path d="M6.2 7.1c-.3-.4-.7-.7-1-1.1-.2-.2-.5-.5-.8-.6-.1-.1-.4 0-.3.2.1.4.5.7.7 1 .3.3.8.8 1.4.7.1 0 .1-.1 0-.2h0zm12.1-1.4c-.3 2.1-.8 4.4-2.1 6.1-1.4 1.7-3.1 2-5 2.5-.5.1-.6 1 0 1.1 2 .4 4.3-1 5.6-2.5 1.7-2 2.2-4.6 2.2-7.2 0-.3-.6-.4-.7 0h0z"></path>
                                                        <path d="M20.2 7.8c0-.4-.4-.7-.6-1.1L19 5.4c-.2-.3-.7-.2-.6.2.1.5.3 1.1.6 1.5.2.4.6.9 1.1.8 0 0 .1 0 .1-.1h0z"></path>
                                                        <path d="M16.8 7c.3.2.7 0 1-.2.4-.3.9-.7 1.1-1.1 0-.2-.1-.4-.3-.3-.4.1-.7.5-1 .8-.3.2-.5.4-.7.6-.1 0-.1.1-.1.2h0zM11.2.1c-.5 0-.8.6-1.1 1s-.8.8-1.1 1.3a.22.22 0 0 0 .3.3c.6-.1 1-.7 1.3-1.1.3-.3.8-.9.7-1.4.1 0 0-.1-.1-.1h0z"></path>
                                                        <path d="M11.1.3c-.2.5.4 1.1.6 1.4.3.4.8 1 1.4 1.1.2 0 .4-.2.3-.4-.2-.5-.8-.9-1.1-1.3-.3-.3-.6-.9-1-.9-.1-.1-.2 0-.2.1h0zM7.6 18.8c2.5.2 5.3.4 7.7.2.6-.1.8-.9.1-1.1-2.5-.4-5.5-.2-8 .2-.3.1-.1.7.2.7h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div>
                                        
                                        <div class="bgec-single-feature-item" style="background: rgb(140, 115, 44); border-radius: 10px; color: rgb(0, 0, 0);">
                                            <i class="bgec-arrow-icon"><!----></i>
                                            <p>32.1</p>
                                            <span style="">
                                                <div height="14" width="14" style="color: rgb(0, 0, 0);">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23px" height="23px" viewBox="0 0 23 23" fill="currentColor">
                                                        <path d="M2.9 8.8c0 4.4 4 7.8 8.3 8 .9 0 .9-1.4 0-1.5-4.1-.3-6.7-2.8-7.9-6.5-.1-.2-.4-.2-.4 0h0z"></path>
                                                        <path d="M19.4 8.8c-1.3 3.8-3.8 6.3-7.9 6.6-.9.1-.9 1.5 0 1.5 4.2-.2 8.2-3.6 8.3-8-.1-.3-.4-.3-.4-.1h0zm-12 3.6c2.5 2.7 6.7 2 9.1-.4 2.7-2.7 2.7-7.1-.1-9.7-2.7-2.6-6.6-2.8-9.5-.5-3 2.3-3.4 7.2-.6 9.8.5.5 1.3-.2.8-.8-2-2.5-1.5-5.9.8-8 2.3-2.2 5.8-1.7 7.9.5 4.9 5.1-2.5 12.6-8 8.7-.4-.2-.7.2-.4.4h0z"></path>
                                                        <path d="M11.6 22.7c.2-1.3.2-2.7.3-4l.1-4.6c-.1-.5-1-.8-1.1-.1-.2 1.5 0 3 0 4.4.1 1.5 0 2.9.3 4.4 0 .1.4.1.4-.1h0z"></path>
                                                        <path d="M8.7 18.9c.9.2 1.8.2 2.7.2s1.8.1 2.7-.1c.3-.1.3-.6 0-.6-.9-.1-1.8-.1-2.7 0-.9 0-1.8 0-2.7.3-.2-.1-.2.2 0 .2h0z"></path>
                                                    </svg>
                                                </div>
                                            </span>
                                        </div><!----><!---->
                                    </div>
                                </li>
                            </ul><!---->
                        </div>
                    </div>
                </div>

                <!-- END CHART -->

                <!-- START SPECS -->                  
                
                <div class="bgec-chart-specs">
                    <div class="bgec-properties-chart-inner">
                
                
                        <ul>
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Name:</h3>
                                    </div>
                                    
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Test 001</p><!---->
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Birth Date:</h3>
                                    </div>
                
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">8th March 1980 @ 12:00 AM</p><!---->
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Age:</h3>
                                    </div>
                                    
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">44</p><!---->
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Birth Place:</h3>
                                    </div>
                                    
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Houston, Texas, United States</p><!---->
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Design Date:</h3>
                                    </div>
                                    
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">12th December 1979 @ 11:13 AM</p><!---->
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Type:</h3>
                                    </div>
                                    
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Generator</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Strategy:</h3>
                                    </div>
                                    
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">To Respond</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Inner Authority:</h3>
                                    </div>
                                    
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Emotional</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Definition:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Split Definition</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Profile:</h3>
                                    </div>              
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">1 / 4</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Incarnation Cross:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Right Angle Cross of Rulership (22/47 | 26/45)</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Signature:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Satisfaction</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Not-Self Theme:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Frustration</p>
                                        <div class="bgec-action-property"><a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                            <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <g id="Group-10">
                                                    <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                    <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                </g>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Digestion:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Consecutive</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Sense:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Uncertainty</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Design Sense:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Smell</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Motivation:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Innocence</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>                
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Perspective:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Personal</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Environment:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Kitchens</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                            <div class="bgec-property-single-item">
                            <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Decision-Making Strategy:</h3>
                            </div>
                            <div class="bgec-property-content">
                                <p style="font-family: Roboto; color: rgb(57, 62, 81);">Respond then wait for clarity</p><!---->
                            </div>
                            </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Skills &amp; Attributes:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">Dedication - Propaganda, Credibility, Talent, Competences<br>Capacity - Customer Service, Connections, Fundamentals, Knowledge<br>Capacity - Talent, Competences, Propaganda, Credibility<br>Teamwork - Talent, Competences, Propaganda, Credibility<br>Capacity - Leadership, Trust, Determination and Capital</p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Gates:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">
                                            <span>3</span>
                                            <span class="inline-comma">,</span>
                                            <span>6</span>
                                            <span class="inline-comma">,</span>
                                            <span>14</span><span class="inline-comma">,</span>
                                            <span>22</span><span class="inline-comma">,</span>
                                            <span>26</span><span class="inline-comma">,</span>
                                            <span>29</span><span class="inline-comma">,</span>
                                            <span>30</span><span class="inline-comma">,</span>
                                            <span>32</span><span class="inline-comma">,</span>
                                            <span>40</span><span class="inline-comma">,</span>
                                            <span>43</span><span class="inline-comma">,</span>
                                            <span>45</span><span class="inline-comma">,</span>
                                            <span>46</span><span class="inline-comma">,</span>
                                            <span>47</span><span class="inline-comma">,</span>
                                            <span>54</span><span class="inline-comma">,</span>
                                            <span>55</span><span class="inline-comma">,</span>
                                            <span>59</span><span class="inline-comma">,</span>
                                            <span>63</span>
                                        </p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Channels:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">
                                            <span>29 - 46</span>
                                            <span class="inline-comma">,</span>
                                            <span>32 - 54</span>
                                            <span class="inline-comma">,</span>
                                            <span>6 - 59</span>
                                        </p>
                                        
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Open Centers:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">
                                            <span>Heart</span><span class="inline-comma">,</span>
                                            <span>Throat</span><span class="inline-comma">,</span>
                                            <span>Ajna</span><span class="inline-comma">,</span>
                                            <span>Head</span>
                                        </p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                
                            <li>
                                <div class="bgec-property-single-item">
                                    <div class="bgec-property-label" style="background-color: rgb(244, 244, 244);">
                                        <h3 style="font-family: Roboto; color: rgb(57, 62, 81);">Defined Centers:</h3>
                                    </div>
                                    <div class="bgec-property-content">
                                        <p style="font-family: Roboto; color: rgb(57, 62, 81);">
                                            <span>Sacral</span>
                                            <span class="inline-comma">,</span>
                                            <span>Solar Plexus</span>
                                            <span class="inline-comma">,</span>
                                            <span>G</span>
                                            <span class="inline-comma">,</span>
                                            <span>Root</span>
                                            <span class="inline-comma">,</span>
                                            <span>Splenic</span>
                                        </p>
                                        <div class="bgec-action-property">
                                            <a href="#" class="bgec-open-modal" style="font-family: Roboto; color: rgb(57, 62, 81);">
                                                <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="Group-10">
                                                        <path d="M8.5 0C3.80558 0 0 3.80558 0 8.5C0 13.1944 3.80558 17 8.5 17C13.1944 17 17 13.1944 17 8.5C17 3.80558 13.1944 0 8.5 0ZM8.5 15.9375C4.39237 15.9375 1.0625 12.6076 1.0625 8.5C1.0625 4.39237 4.39237 1.0625 8.5 1.0625C12.6076 1.0625 15.9375 4.39237 15.9375 8.5C15.9375 12.6076 12.6076 15.9375 8.5 15.9375Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M8.5 9.5625C9.0868 9.5625 9.5625 9.0868 9.5625 8.5C9.5625 7.9132 9.0868 7.4375 8.5 7.4375C7.9132 7.4375 7.4375 7.9132 7.4375 8.5C7.4375 9.0868 7.9132 9.5625 8.5 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M12.2188 9.5625C12.8056 9.5625 13.2813 9.0868 13.2813 8.5C13.2813 7.9132 12.8056 7.4375 12.2188 7.4375C11.6319 7.4375 11.1563 7.9132 11.1563 8.5C11.1563 9.0868 11.6319 9.5625 12.2188 9.5625Z" fill="currentColor" stroke="none"></path>
                                                        <path d="M4.78125 9.5625C5.36805 9.5625 5.84375 9.0868 5.84375 8.5C5.84375 7.9132 5.36805 7.4375 4.78125 7.4375C4.19445 7.4375 3.71875 7.9132 3.71875 8.5C3.71875 9.0868 4.19445 9.5625 4.78125 9.5625Z" fill="currentColor" stroke="none"></path>
                                                    </g>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                    </ul>
                
                
                
                
                    </div>
                </div>

                <!-- END SPECS -->
            </section>
            just a sample code
        </article> ';

        return $html;
}

add_shortcode ('sample-profile', 'sample_profile_shortcode');

function custom_form_new_shortcode() {
    ob_start(); // Start output buffering
    ?>
    <form id="custom-data-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
        <input type="hidden" name="action" value="unique_custom_form_submit">
        <input type="hidden" name="timezone" id="timezone">
        <?php wp_nonce_field('custom_form_submit_action', 'custom_form_nonce'); ?>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="place">Place of Birth:</label><br>
        <input type="text" id="location" name="place" required><br>
        <label for="dob">Date of Birth (Y-M-D H:I):</label><br>
        <input type="text" id="dob" name="dob" required placeholder="2011-10-01 11:25AM"><br>
        <br>
        <input class="gen-btn" type="submit" value="Generate Chart">
    </form>
<div id="response-message"></div>
<div id="chart-container"><!-- Chart will be displayed here --></div>
    <?php
    return ob_get_clean(); // Return the buffered content
}
add_shortcode('custom_form_new', 'custom_form_new_shortcode');




?>