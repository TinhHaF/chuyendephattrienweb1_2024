<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');

$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

$url_path = $url_host . $matches[1][0];

$url_path = str_replace('\\', '/', $url_path);
?>

<div class="type-3061">
    <form>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Where would you like to have a phone number?</label>
                        <select id="country-select" name="country">
                            <option value="">Select Country</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Belgium">Belgium</option>
                            <option value="Australia">Australia</option>
                        </select>
                        <select id="state-select" name="state">
                            <option value="">Select State</option>
                        </select>
                        <select id="select-number" name="number">
                            <option value="">Select Number</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Select a plan</label>
                        <select id="select-plan" name="plan">
                            <option value="Standard - Free (Monthly)">Standard - Free (Monthly)</option>
                        </select>
                        <label>Where should incoming calls be forwarded to?</label>
                        <select id="select-your-country" name="forward-to">
                            <option value="">Your Country</option>
                        </select>
                        <div class="slider-container">
                            <input id="minutesSlider" type="range" min="0" max="1000" value="0" class="slider" />
                            <div id="minutesDisplay" class="minutes-display">0 minutes</div>
                            <div class="description">incoming calls per month.</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="price-container">
                        <h2>Price</h2>
                        <p>Monthly Fee</p>
                        <p class="price">A$2.99</p>
                        <p>Estimated monthly cost</p>
                        <button class="button">Get this number</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>