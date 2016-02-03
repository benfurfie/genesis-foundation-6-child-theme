<?php

function foundation_page_structure() {
  ?>

    <div class="row">
      <div class="small-12 columns">
        <h1>Hello World!</h1>
      </div>
    </div>
    <div class="row">
      <small-12 class="columns">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </small-12>
    </div>

  <?php
}
//add_action( 'genesis_loop', 'foundation_page_structure' );


genesis();
