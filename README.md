  # Elementor Custom Cover Image Field

Adds a custom cover image field to Elementor's post settings and a dynamic tag to retrieve it.

## Description

This plugin extends Elementor to add a custom cover image field in the post settings. It also provides a dynamic tag that can be used within Elementor to retrieve and display the cover image.

## Installation

1. Download the plugin zip file or clone the repository to your local machine.
2. Upload the plugin files to the `/wp-content/plugins/elementor-custom-cover-image` directory, or install the plugin through the WordPress plugins screen directly.
3. Activate the plugin through the 'Plugins' screen in WordPress.
4. Edit a post or page using Elementor and set the custom cover image in the post settings panel.

## Usage

### Setting the Cover Image

1. Edit a post or page with Elementor.
2. In the post settings panel on the left, you will find a new section named **Cover Image**.
3. Upload or select an image from the media library to set as the cover image.

### Using the Dynamic Tag

1. Add a widget to your Elementor page (e.g., Section, Container, or Image widget).
2. In the widget settings, click on the dynamic tags icon for the background image or image source.
3. Select the **Custom Cover Image** tag from the list.

## Development

### Plugin Structure

- `elementor-custom-cover-image.php`: Main plugin file.
- `includes/class-elementor-custom-cover-image-widget.php`: Handles the addition of the custom cover image field to Elementor's post settings.
- `includes/class-elementor-custom-cover-image-tag.php`: Defines the custom dynamic tag to retrieve the cover image URL.

### Main Plugin File

The main plugin file initializes the plugin, includes necessary files, and sets up hooks for adding controls and saving the cover image URL.

### Custom Widget File

This file defines the custom control added to Elementor's post settings to allow users to upload and select a cover image. It ensures the cover image URL is saved and removed correctly in post meta.

### Custom Dynamic Tag File

This file defines the custom dynamic tag to retrieve and display the cover image URL within Elementor widgets. It handles the unserialization of the saved meta data and outputs the image URL.

## Troubleshooting

- **Cover Image URL not displayed:** Ensure that the cover image is set in the post settings and that the dynamic tag is correctly selected in the widget settings.
- **Placeholder image shown:** If the cover image is removed, ensure the post meta is cleaned up correctly to fall back to the placeholder image.

## Contributing

1. Fork the repository.
2. Create your feature branch (`git checkout -b feature/your-feature`).
3. Commit your changes (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature/your-feature`).
5. Open a pull request.
