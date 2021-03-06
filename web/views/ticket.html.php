<div class="wrapper">
  <div class="page">
    <div class="information">
      <h3>Your Ticket</h3>
      <div class="list">
        <p>Thank you for your purchase. We&rsquo;ll be seeing you on 23rd September, and, <em>frankly</em>, we can&rsquo;t wait.</p>
      </div>

      <div class="ticket">
        <ul class="data">
          <li>
            <span class="term">Name</span>
            <span class="value"><?= $purchase->name ?></span>
          </li>
          <li>
            <span class="term">Email</span>
            <span class="value"><?= $purchase->email ?></span>
          </li>
          <? foreach($purchase->tickets as $ticket) { ?>
            <li>
              <span class="term">Purchase</span>
              <span class="value">1x <?= $ticket->release->title ?> #<?= $ticket->number ?> @ &#8364;<?= $ticket->price ?></span>
            </li>
          <? } ?>
          <li>
            <span class="term">Reference</span>
            <span class="value"><?= $purchase->cached_slug ?></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<div id="header">
  <a href="/">
    <h1>Funconf</h1>
  </a>
</div>

<div class="band">
  <ul class="more-info">
    <li class="date"><span>23rd</span> &ndash; <span>25th</span> September</li>
    <li class="year">11</li>
    <li class="link"><span>Lismore Castle</span>, Ireland</li>
  </ul>
</div>