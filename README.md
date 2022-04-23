# public_html
This repository holds files supporting the Open Environments website.
It is a PHP application using Javascript with a Postgres database backend.
The code is licensed using the GNU Affero General Public License v3.0 terms,
so it may be shared but not changed. Open Environments reserves the copyright
to this application, without warranty and strictly limited liability.

The web application includes:

* A 'LAPP' architecture using linux, Apache, postgres, php and Javascript.
* A header, content, footer design with content changing depending on the page.  All pages begin with header.php and complete with footer.php.
* Three major modals/windows for Login, Registration and Profile editing.
* Session managment using the isset of member_id as the flag that a member has logged in.

In addition, the application depends on a postgres database with:
* A schema named core to hold the applications meta talbes.
* A table named core.page to store webpage metadata (titles, tags, etc).
* A table named core.member storing the registered user identities.
* Tables core.publisher and core.publication to drive those pages' content.
