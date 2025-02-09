<!-- <h1>Oops! Something went wrong!</h1> -->
<!-- <p>
  <?php
    // htmlspecialchars($errorMessage)
  ?>
</p> -->

<?php if ($isDebug): ?>
  <!-- <h2>Stack Trace:</h2>
  <pre><?php 
    // htmlspecialchars($trace) 
    ?></pre> -->
<?php endif; ?>

<section class="page-section">
  <div class="full-width-screen">
    <div class="container-fluid">
      <div class="content-detail">
        <div class="pendulum-platform">
          <div class="pendulum-holder"></div>
          <div class="pendulum-thread">
            <div class="pendulum-knob"></div>
            <div class="pendulum">500</div>
          </div>
          <div class="pendulum-shadow"></div>
        </div>
        <div class="text-detail">
        <h4 class="sub-title">Oops!</h4>
          <p class="detail-text">Internal Server Error,<br> The server cannot process the request for an unknown reason.</p>
            <div class="back-btn">
                <a href="/" class="btn">Back to Home</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>