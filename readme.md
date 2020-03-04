## Laser Red WP - Bikes-R-Us

### Installation 
* Clone this repo into an active, clean WP installation under `wp-content/themes`
* Within the theme, under `data`, you'll find three files: 
	* `laserred-wp-uploads.tar.gz` - This has all the images used for posts, WC products and shortcodes. 
		* Move this file to `wp-content/uploads` and run the following command: `tar -zxf laserred-wp-uploads.tar.gz --strip-components=1`
	* `laserred_wp.sql.gz` - this is a DB dump - It's setup to drop and create all tables and insert data 
		* If you need to do anything different,  give me a shout and I'll do another DB dump with the settings you want. 
	* `laserred-wp-plugins.tar.gz`
		* Move this to the plugins directory and run `tar -zxf laserred-wp-plugins --strip-components=1`
* The gulp-built assets are git committed,  so you won't have build them locally.  

I tried to get most of this done, however I didn't manage to complete it all (only the hero slider at the start is missing - also wasn't entirely sure what the behaviour of the slider was meant to be). 

Time wise, as I've been doing this in the evenings after work, and at the weekend, I don't know how long exactly I've spent on it - definitely more than the 6 hours though.

WP features that I've utilised in this: 
* Custom Post Types - Events and Testimonials (both are using the [Advanced Custom Fields](https://www.advancedcustomfields.com/) plugin to create meta fields)
* Hooking Menus in - Header and 3 footer menu locations are defined and in use. 
	* Note: I've added a bunch of extra pages (with no content) so the current page decoration in the header menu functions nicely.
* Shortcodes - Everything on the homepage is a shortcode, with editable attributes (if you go and edit the home page you can see)
* I've utilised WooCommerce, but only to the extent of fetching the products and their names / featured image - I couldn't manage to get the price and category info to pull through. 

Something I should mention is that I've utilised [Timber](https://www.upstatement.com/timber/), as I've used it a few times before (at my current job) in some WP-based internal projects, and it uses Twig, of which I have experience in, as it's the default templating engine used in Symfony.  