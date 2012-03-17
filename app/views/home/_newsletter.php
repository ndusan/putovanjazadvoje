<div id="newsletter">
    <form name="newsletter_form" action="<?=DS.'newsletter';?>" method="post">
        <input type="text" name="email" id="newsletter_email" value="Please, enter your email" title="Please, enter your email"/>
        <input type="submit" name="submit_newsletter" value="Submit"/>
    </form>
</div>
<!-- on request load this part -->
<script src="<?=DS.'public'.DS.'js'.DS.'default'.DS.'app.custom.js';?>" type="text/javascript"></script>    