<style>
        h3 {
            font-size: 2em;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }

        .example {
            background: #ecf0f1;
            padding: 15px;
            border-left: 4px solid #3498db;
            margin: 15px 0;
            border-radius: 5px;
        }

        .example code {
            font-family: 'Courier New', Courier, monospace;
            color: #e74c3c;
            font-weight: bold;
        }

        .description {
            margin-top: 10px;
            color: #555;
        }

        .note {
            font-style: italic;
            color: #7f8c8d;
            font-size: 0.9em;
            margin-top: 20px;
            text-align: center;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h3 {
                font-size: 1.5em;
            }
        }
</style> 

<h3>How to Use <b>myreviews</b> PHP Function</h3>

<hr>

<div class="example">
	<code>&lt;?php myreviews('gg', 3); ?&gt;</code>
	<div class="description">Displays 3 random Google reviews.</div>
</div>

<div class="example">
	<code>&lt;?php myreviews('fb', 2); ?&gt;</code>
	<div class="description">Displays 2 random Facebook reviews.</div>
</div>

<div class="example">
	<code>&lt;?php myreviews('ta', 4); ?&gt;</code>
	<div class="description">Displays 4 random Tripadvisor reviews.</div>
</div>

<div class="example">
	<code>&lt;?php myreviews('my', 3); ?&gt;</code>
	<div class="description">Displays 3 random Custom reviews.</div>
</div>

<div class="example">
	<code>&lt;?php myreviews('', 5); ?&gt;</code>
	<div class="description">Displays 5 random reviews from any platform.</div>
</div>

<div class="example">
	<div class="description">You can change the generic Custom logo by replacing: <span class="tpl">plugins/myReviews/images/my-logo.png</span></div>
</div>
