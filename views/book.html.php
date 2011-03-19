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
          <? foreach($event->tickets() as $ticket) { ?>
            <?= $ticket->name(); ?>
          <? } ?>
          <span class="name">&nbsp;</span>
          <span class="price">price</span>
          <span class="expiration">expires</span>
          <span class="quantity right">quantity</span>
        </li>
        <li>
          <span class="name">Early Bird</span>
          <span class="price">&#8364;495</span>
          <span class="expiration">30 Apr 2011</span>
          <span class="quantity right">32 left</span>
        </li>
        <li>
          <span class="name">Regular Price</span>
          <span class="price">&#8364;695</span>
          <span class="expiration">23 Sep 2011</span>
          <span class="quantity right">75 left</span>
        </li>
      </ul>
    </div>

    <div class="register">
      <h3>Get Yours</h3>
      <form>
        <fieldset class="fields">
          <div class="field">
            <label for="name">name</label>
            <input type="text" placeholder="John Hancock" title="name" id="name" />
          </div>
          <div class="field">
            <label for="email">email</label>
            <input type="text" placeholder="jhancock@congress.gov" title="email" id="email" />
          </div>
          <div class="field">
            <label for="discount">discount</label>
            <input type="text" placeholder="" title="discount" id="discount" />
          </div>
          <div class="field">
            <label for="quantity">quantity</label>
            <select title="quantity" id="quantity">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <span class="total"><em>&#8364;</em>495</span>
          </div>
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