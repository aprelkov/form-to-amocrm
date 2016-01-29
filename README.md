<h1>Adding Lead & Contact to amoCRM from Website</h1>

<h3>Objective:</h3>

This Script automatically creates connected Lead and Contact in amoCRM when sending Data from a standart html-form on your Website.
With small adjustments, this Script can be easily adapted to integrate amoCRM with any Website using html-form.

<h3>Features:</h3>

<b>Binding of Contact to the Lead</b>
<br/>All Contacts are linking to the relevant Leads.
<br/>If Contact with the Email already exists, Leads are linking to the existing Contact. The new Contact isn't creating.
<br/>However, there is a small bug in the internal contacts search algorithm of amoCRM. If an email address before or after the at sign @ contains less than 3 characters, then these characters are not considered in the search, and the Lead can be attached to a similar Contact. <br/>Fortunately this bug occurs very rarely.

<h3>Setting up:</h3>

The file <i>prepare.php</i>: Edit the data of resuting Array in this file so that it coincide with the data sent from the html-form;
<br/>The file <i>auth.php</i>: Replace the authorization Data on your amoCRM Data: Username (email), Hash (API key) and Subdomain;
<br/>The file <i>fields_info.php</i>: Edit the list of Variables for the custom Fields as you need at the top of the Script;
<br/>The file <i>lead_add.php</i>: Edit additional Fields Id as well as Variables that you want to send to this Fields.

<h3>Testing:</h3>

At this Repository I created a convenient test function.
<br/>You needn't to fill out a form each time and make an order on Service that you are integrating.
<br/>Just open thethe root folder ( file <i>test/index.html</i>) after loading the Script on your hosting, and you'll see simple example of html-form. Full fill the form and click "Create Lead & Contact", and you'll see the result.

<h3>Support:</h3>

If you have any questions, write to me in PM.
<br>I'll be glad to help you!
