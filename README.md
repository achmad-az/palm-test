# Palm-test

In this repository i put the whole wp-content directory & database sql file to make easier to install this theme.

1. just install fresh wordpress in your local
2. pull this repo
3. replace your wp-content directory
4. import the database
5. by this method you will easier and faster to install this theme and plugin

# Contact Submission Plugin

Version: 1.0
Author: Achmad Az
License: GPL2

A simple WordPress plugin to handle contact submissions using a custom post type. This plugin integrates with Contact Form 7 to save form submissions as custom posts in the WordPress admin panel.

# Features

	•	Automatically save Contact Form 7 submissions as “Contact Submission” custom posts.
	•	Supports fields: Name, Email, Phone, Services, and Message.
	•	Allows manual addition and editing of submissions in the WordPress admin panel.
	•	Simple, user-friendly interface.
# Requirements

	•	WordPress 5.0 or higher
	•	PHP 7.4 or higher
	•	Contact Form 7 plugin (must be installed and activated)
 # Installation

	1. Install Contact Form 7:
	   •    Go to Plugins > Add New in the WordPress admin panel.
	   •	Search for “Contact Form 7” and install the plugin.
	   •	Activate the Contact Form 7 plugin.
	2. Install the Contact Submission Plugin:
	   •	Download the contact-submission.zip file.
	   •	Go to Plugins > Add New > Upload Plugin in the WordPress admin panel.
	   •	Choose the contact-submission.zip file and click Install Now.
	   •	Activate the Contact Submission plugin.
# How to Use

1. Configure Contact Form 7

	 • Create a form in Contact Form 7 with the following fields (or customize as needed):
		Your Name: [text* your-name]
		Your Email: [email* your-email]
		Your Phone: [tel your-phone]
		Services: [select* your-services "Consultation" "Installation" "Maintenance" "Support"]
		Your Message: [textarea your-message]
		[submit "Send"]
	 • Note: The field names (e.g., your-name, your-email) should match the ones configured in the plugin.
2. Submit a Form

	•	Embed the form using the shortcode provided by Contact Form 7, e.g., [contact-form-7 id="123" title="Contact Form"].
	•	When a user submits the form, their data will be saved as a new “Contact Submission” post.

3. View Submissions

	•	Go to Contact Submissions in the WordPress admin menu to view all saved submissions.
	•	Each submission includes the following fields:
	•	Name
	•	Email
	•	Phone
	•	Services
	•	Message

4. Manually Add or Edit Submissions

	•	Add new submissions by clicking Add New under Contact Submissions.
	•	Edit existing submissions by clicking Edit on any submission.
# Notes

	•	This plugin only processes submissions from Contact Form 7 forms.
	•	If Contact Form 7 is not installed or activated, the plugin will not function properly.
	•	Manual additions and edits are independent of Contact Form 7 and can be managed directly from the WordPress admin panel.
 # Uninstallation

	•	Deactivate the plugin in Plugins > Installed Plugins.
	•	Optionally, delete the plugin.
	•	Note: All saved “Contact Submission” posts will be removed upon uninstallation.
 # Support

	For support or issues, please contact me at achmad.azman@gmail.com.
