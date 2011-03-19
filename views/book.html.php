<div class="wrapper">
  <div class="page">
    <div class="information">
      <h3>Ticketing</h3>
      <ul class="list bulleted">
        <li class="odd"><em>Travel</em> from Dublin to Lismore;</li>
        <li><em>two nights</em> bed and breakfast accommodation in Lismore;</li>
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
                <? $parsed_date = date_parse($release->end_at) ?>
                <?= $parsed_date['year'] ?>-<?= $parsed_date['month']?>-<?= $parsed_date['day'] ?>
              </span>
              <span class="quantity right"><?= $release->quantity_left ?> left</span>
            </li>
          <? } ?>
        <? } ?>
      </ul>
    </div>

    <div class="register">
      <h3>Get Yours</h3>
      <form action="?/book">
        <fieldset class="fields">
          <div class="field">
            <label for="name">name</label>
            <input type="text" placeholder="John Hancock" title="name" id="name" name="purchase[name]"/>
          </div>
          <div class="field">
            <label for="email">email</label>
            <input type="text" placeholder="jhancock@congress.gov" title="email" id="email" name="purchase[name]"/>
          </div>
          <div class="field">
            <label for="discount">discount</label>
            <input type="text" placeholder="" title="discount" id="discount" name="purchase[discount]"/>
          </div>
          <? $i = 0 ?>
          <? foreach($ticket_types as $ticket) { ?>
            <? foreach($ticket->releases as $release) { ?>
              <? $i = $i + 1 ?>
              <div class="field">
                <label for="quantity">quantity</label>
                <select title="quantity" id="quantity" name="line_items_attributes[<? $i ?>][quantity]">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
                <input type="hidden" name="line_items_attributes[<? $i ?>][release_id]" value="<?= $release->id ?>">
                <input type="hidden" name="line_items_attributes[<? $i ?>][ticket_type_id]" value="<?= $ticket_type->id ?>">
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