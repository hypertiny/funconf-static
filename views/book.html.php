<div class="wrapper">
  <div class="page">
    <div class="information">
      <h3>Ticketing</h3>
      <ul class="list bulleted">
        <li class="odd"><em>Travel</em> from Dublin to Lismore;</li>
        <li>
          <em>two nights</em> bed and breakfast accommodation in Lismore (either
          <a href="http://www.lismorehousehotel.com/">Lismore House Hotel</a>
          or
          <a href="http://www.waterfordhotel.com/">Ballyrafter House Hotel</a>);
        </li>
        <li class="odd">dinner and <em>party</em> on Friday night;</li>
        <li>keynotes and sessions in the <em>castle</em>;</li>
        <li class="odd">guided lunchtime <em>activities</em> (and packed lunch);</li>
        <li>3 course <em>gala</em> dinner;</li>
        <li class="odd"><em>after party</em>;</li>
        <li>
          <em>and</em><br />
          <em>ample</em> refreshment for the <em>entire</em> weekend.</li>
      </ul>

      <ul class="pricing">
        <li class="legend">
          <span class="name">&nbsp;</span>
          <span class="price">price</span>
          <span class="expiration">expires</span>
          <span class="quantity right">quantity</span>
        </li>
        <? foreach($ticket_types as $ticket) { ?>
          <? foreach($ticket->releases as $release) { ?>
            <li>
              <span class="name"><?= $release->title ?></span>
              <span class="price">&#8364;<?= $release->price ?></span>
              <span class="expiration">
                <? $d = new Datetime($release->end_at); ?>
                <?= $d->format('j M Y') ?>
              </span>
              <span class="quantity right"><?= $release->quantity_left ?> left</span>
            </li>
          <? } ?>
        <? } ?>
      </ul>
    </div>

    <div class="register">
      <h3>Get Yours</h3>
      <form action="?/book" method="POST">
        <fieldset class="fields">
          <div class="field">
            <label for="name">
              <? if(isset($purchase)) { ?>
                <strong>name*</strong>
              <? } else { ?>
                name*
              <? } ?>
            </label>
            <input type="text" placeholder="John Hancock" title="name" id="name" name="name" value="<?= @$_POST['name'] ?>"/>
          </div>
          <div class="field">
            <label for="email">
              <? if(isset($purchase)) { ?>
                <strong>email*</strong>
              <? } else { ?>
                email*
              <? } ?>
            </label>
            <input type="text" placeholder="jhancock@congress.gov" title="email" id="email" name="email" value="<?= @$_POST['email'] ?>"/>
          </div>
          <div class="field">
            <label for="discount">discount</label>
            <input type="text" placeholder="" title="discount" id="discount" name="discount" value="<?= @$_POST['discount'] ?>"/>
          </div>
          <? $i = 0 ?>
          <? foreach($ticket_types as $ticket) { ?>
            <? foreach($ticket->releases as $release) { ?>
              <? $i = $i + 1 ?>
              <div class="field">
                <label for="quantity">quantity</label>
                <select title="quantity" id="quantity" name="quantity">
                  <option value="1" <?= @$_POST['quantity'] == '1' ? 'selected' : '' ?>>1</option>
                  <option value="2" <?= @$_POST['quantity'] == '2' ? 'selected' : '' ?>>2</option>
                  <option value="3" <?= @$_POST['quantity'] == '3' ? 'selected' : '' ?>>3</option>
                  <option value="4" <?= @$_POST['quantity'] == '4' ? 'selected' : '' ?>>4</option>
                  <option value="5" <?= @$_POST['quantity'] == '5' ? 'selected' : '' ?>>5</option>
                </select>
                <input type="hidden" name="release_id" value="<?= $release->id ?>">
                <input type="hidden" name="ticket_type_id" value="<?= $ticket->id ?>">
                <span class="total"><em>&#8364;</em><?= $release->price ?></span>
              </div>
            <? } ?>
          <? } ?>
        </fieldset>
        <fieldset class="buttons">
          <div class="button"><input type="submit" value="Checkout with Paypal" /></div>
        </fieldset>
      </form>
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