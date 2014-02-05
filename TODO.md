Todo List
=========

Projects
--------

- Allow users to subscribe to a project
    - There should be a "Subscribe" button that any logged-in user can see and click. It should be greyed-out if he is already subscribed. Use the current css class for blue buttons.
    - Whenever a project owner edits a project, before submitting it he should be able to check a flag to "send update message to subscribers".
    - Whenever someone posts on a project, an update message should be sent to subscribers containing the poster and the post message.
    - Sending an update message:
        - All subscribers should receive an email saying what happened ("project X updated", "someone commented" etc) and maybe an SMS too.


SMS-related
-----------

- Remove the `receivesms` flag from Users
    - Instead just check if the user does not have a carrier set or if the carrier is null (not sure which to check atm)
- Vastly simplify gateway table
    - Just have the top 10 or so US carriers and maybe some Californian ones too.
    - Have only 1 row for each carrier (currently some carriers are listed twice because they seem to have multiple addresses, though it might be worth checking if some of them are obsolete).
    - For the `address` field, if that carrier has more than 1 address (for example AT&T seems to have `mobile.att.net` and `txt.att.net`), use a comma-separated list of all the addresses (for example: `mobile.att.net,txt.att.net`). After fetching data in the application, use php's `explode()` on the address field to get all the addresses to send the SMS to.
        - This is the alternative to looping through the multiple gateways that a user has, as it is currently implemented.
- Remove the "max 5 carriers" check in `User->beforeSave()` (after implementing the above)


Email and Phone Image Generation
--------------------------------

- Find a way to make the API sane (maybe setup some better default settings)
    - See `UsersController->view()` for an example of this atrocity.
- Or just remove it, and only show contact info to logged in members (would solve the scraping problem).


Random
------
-none at the moment
