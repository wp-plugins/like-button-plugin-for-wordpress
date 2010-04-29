=== Like-Button-Plugin-For-Wordpress ===
Contributors: GangXtaBoii
Donate link:https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=SB94ME
Tags: facebook, like button, open graph protocol
Requires at least: 2.7.x
Tested up to: 2.9.x
Stable tag: 1.3.6.2

Adds a Shortcode [like] which inserts the code for your Like-Button-Plugin-For-Wordpress.You can add it where ever you want. Also a little Like-Button widget is then available. This widget includes a little Like-Button-Generator to make it easier for you to get a Like-Button to your sidebar.

== Description ==

Adds a Shortcode `[like]` which inserts the code for your Facebook-Like-Button. You can create a like-Button with the FB-LB-Generator on the settings-page. After that it is possible to create some Open-Graph-Protocol-Meta-Tags which will be written in the <head>-section. Also the JavaSDK will be used for your Buttons. But only if you enter a valid Facebook-AppID into the AppID-Box.

Now you can put the shortcode `[like]` where ever you want to insert the Facebook-Like-Button.

There is also a new Widget available. Go to the Widget-Page and add the Facebook-Like-Button-Generator to your sidebar. Enter all your information into the FB-LB-Generator - that's it.

| [More Information](http://gangxtaboii.com/like-button-plugin-for-wordpress) | 
| [Support](http://gangxtaboii.com/forum/viewforum.php?f=22&start=0) |

== Installation ==

Extract the zip file and just drop the contents in the `/wp-content/plugins/` directory of your WordPress installation and then activate the Plugin from Plugins page

== Frequently Asked Questions ==

**Short-FAQ:** 

   1. Install the Plugin

   2. Go to the Settings-Page and complete all the required information and activate the Plugin with the first checkbox on this site.

   3. Facebook-Generator-FAQ:
          * The URL must look like this -> http://example.com . Otherwise the Button will not work properly.

   4. [like]-Shortcode
          * You only have to insert [like] into a post/article and your like-Button (generated on this Option-Page) will appear

   5. Facebook-Like-Button-Widget
          * Go to the Widgets-Page on the left. Add the "Facebook-Like-Button" Widget and add the required information.
          * The URL must look like the URL for the Facebook-Generator on this site.


**Important Notes:**  
  
You only have to enter one of this to Meta-Tags (Admin-ID or AppID) as long as you don not use the Java-SDK.  
**APPID:** If you want to use the Java-SDK you have to enter a valid Facebook-App-ID.  
**Admin-ID:** Facebook-Profile-IDs of all Administrators of this Like-Button.
**Open-Graph-Protocol:** You have to add these attributes

**xmlns:og="http://opengraphprotocol.org/schema/"
xmlns:fb="http://www.facebook.com/2008/fbml">**

to the <html>-tag in your template-header.php-file. If you do not do this the Open-Graph-Protocol will not work with all its functions.


**official FAQ:**

*Under-Construction*

| [Support](http://gangxtaboii.com/forum/viewforum.php?f=22&start=0) |

== Screenshots ==
1. You have to enter this two attributes to the -tag in your "Template-header.php"-file.

**xmlns:og="http://opengraphprotocol.org/schema/"
xmlns:fb="http://www.facebook.com/2008/fbml">**

If you do not do this the Open-Graph-Protocol will not work with all its functions.


== Changelog ==

**<span style=\"text-decoration: underline;\">Changelog &#45; English:</span>**


**Version 1.3.6.2**

*   important bugfix: enabling all functions of the open-graph-protocol
*   extending the FAQ

**Version  1.3.6**

*   some new translations
*   some bugfixes in the background-code

**Version  1.3.5**

*   fix some bugs.

**Version  1.3**

*   relase this version to the official WP-Plugin-Repo.

== Help US ==

Help us translating the Plugin into other languages. Translate it into your language and send us your language-files. Thanks a lot. You'll also get a link on our plugin-page.