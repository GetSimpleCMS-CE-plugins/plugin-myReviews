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

        .section-divider {
            margin: 40px 0 30px 0;
            border-top: 2px solid #3498db;
            padding-top: 20px;
        }

        .parameter-box {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .parameter-box strong {
            color: #856404;
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
    <div class="description">Displays 3 random Google reviews in a grid.</div>
</div>

<div class="example">
    <code>&lt;?php myreviews('fb', 2); ?&gt;</code>
    <div class="description">Displays 2 random Facebook reviews in a grid.</div>
</div>

<div class="example">
    <code>&lt;?php myreviews('ta', 4); ?&gt;</code>
    <div class="description">Displays 4 random Tripadvisor reviews in a grid.</div>
</div>

<div class="example">
    <code>&lt;?php myreviews('my', 3); ?&gt;</code>
    <div class="description">Displays 3 random Custom reviews in a grid.</div>
</div>

<div class="example">
    <code>&lt;?php myreviews('', 5); ?&gt;</code>
    <div class="description">Displays 5 random reviews from any platform in a grid.</div>
</div>

<div class="example">
    <div class="description">You can change the generic Custom logo by replacing: <span class="tpl">plugins/myReviews/images/my-logo.png</span></div>
</div>

<div class="section-divider">
    <h3>How to Use <b>myreviewsCarousel</b> PHP Function</h3>
</div>

<div class="parameter-box">
    <strong>Function Parameters:</strong><br>
    1. <code>$platform</code> - Platform filter: 'gg', 'fb', 'ta', 'my', 'mixed', or '' for all<br>
    2. <code>$count</code> - Number of reviews to fetch (0 = all reviews)<br>
    3. <code>$autoplay</code> - Enable/disable autoplay (true/false, default: true)<br>
    4. <code>$interval</code> - Autoplay interval in milliseconds (default: 5000)<br>
    5. <code>$itemsPerSlide</code> - Number of reviews to show side-by-side (default: 1, max: 4)
</div>

<h4 style="margin-top: 30px; color: #3498db;">Single Review Display</h4>

<div class="example">
    <code>&lt;?php myreviewsCarousel(); ?&gt;</code>
    <div class="description">Displays all reviews one at a time with autoplay (5 seconds interval) and smooth zoom effect.</div>
</div>

<div class="example">
    <code>&lt;?php myreviewsCarousel('', 5); ?&gt;</code>
    <div class="description">Displays 5 random reviews from any platform, one at a time.</div>
</div>

<div class="example">
    <code>&lt;?php myreviewsCarousel('gg', 10); ?&gt;</code>
    <div class="description">Displays 10 random Google reviews, one at a time.</div>
</div>

<div class="example">
    <code>&lt;?php myreviewsCarousel('fb', 6, false); ?&gt;</code>
    <div class="description">Displays 6 Facebook reviews WITHOUT autoplay (manual navigation only).</div>
</div>

<div class="example">
    <code>&lt;?php myreviewsCarousel('ta', 8, true, 3000); ?&gt;</code>
    <div class="description">Displays 8 Tripadvisor reviews with autoplay every 3 seconds (3000ms).</div>
</div>

<h4 style="margin-top: 30px; color: #3498db;">Multiple Reviews Display (Side by Side)</h4>

<div class="example">
    <code>&lt;?php myreviewsCarousel('', 12, true, 6000, 2); ?&gt;</code>
    <div class="description">Displays reviews 2 at a time (side by side), autoplay every 6 seconds.</div>
</div>

<div class="example">
    <code>&lt;?php myreviewsCarousel('gg', 15, true, 7000, 3); ?&gt;</code>
    <div class="description">Displays 3 Google reviews at a time, perfect for desktop displays.</div>
</div>

<div class="example">
    <code>&lt;?php myreviewsCarousel('mixed', 20, true, 8000, 4); ?&gt;</code>
    <div class="description">Displays 4 mixed reviews at a time on wide screens (automatically adjusts to 2 on tablets, 1 on mobile).</div>
</div>

<div class="example">
    <code>&lt;?php myreviewsCarousel('fb', 10, false, 5000, 2); ?&gt;</code>
    <div class="description">Shows 2 Facebook reviews at a time, manual navigation only (no autoplay).</div>
</div>

<div class="example">
    <code>&lt;?php myreviewsCarousel('ta', 12, true, 4000, 3); ?&gt;</code>
    <div class="description">Shows 3 Tripadvisor reviews at a time with fast autoplay (4 seconds).</div>
</div>

<div class="note" style="background: #e8f5e9; padding: 15px; border-radius: 5px; border-left: 4px solid #4caf50;">
    <strong>Responsive Behavior:</strong><br>
    • <strong>4 items per slide:</strong> Shows 4 on desktop (>1024px), 2 on tablet (768-1024px), 1 on mobile (<768px)<br>
    • <strong>3 items per slide:</strong> Shows 3 on desktop (>768px), 2 on tablet (480-768px), 1 on mobile (<480px)<br>
    • <strong>2 items per slide:</strong> Shows 2 on desktop/tablet (>480px), 1 on mobile (<480px)<br>
    • <strong>1 item per slide:</strong> Always shows 1 review at all screen sizes
</div>

<!--div class="note" style="background: #fff3e0; padding: 15px; border-radius: 5px; border-left: 4px solid #ff9800; margin-top: 20px;">
    <strong>Animation Features:</strong><br>
    • Smooth zoom effect with blur transition<br>
    • Staggered animations - each review appears with a slight delay<br>
    • Individual element animations (photo, logo, stars, comments)<br>
    • Hover effects on navigation arrows and indicators<br>
    • Pulse animation on active indicator dot
</div>

<div class="note" style="margin-top: 25px;">
    Both functions display reviews randomly from your SQLite database. The carousel includes navigation arrows and indicator dots for manual control.
</div-->

<div class="note" style="background: #f3e5f5; padding: 15px; border-radius: 5px; border-left: 4px solid #9c27b0; margin-top: 20px;">
    <strong>💡 Pro Tips:</strong><br>
    • For hero sections: Use <code>myreviewsCarousel('', 5, true, 6000, 1)</code><br>
    • For testimonial grids: Use <code>myreviewsCarousel('', 12, true, 7000, 3)</code><br>
    • For sidebar widgets: Use <code>myreviewsCarousel('', 6, true, 5000, 1)</code><br>
    • For footer sections: Use <code>myreviewsCarousel('', 8, true, 8000, 2)</code>
</div>
