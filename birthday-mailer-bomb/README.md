# Birthday Mailer Bomb

A PHP/HTML tool that sends a batch of emails to a specified address, each containing a random meme.

## Features

- Sends multiple emails in succession (“mail bomb”)
- Embeds a randomly selected meme image in each email
- Simple PHP/HTML implementation

## Prerequisites

- PHP 7.0+ with mail support enabled
- A working SMTP configuration (php.ini)

## Installation

1. Clone this folder into your web server’s document root:
   ```bash
   git clone https://github.com/ragarwalll/helloworld-collections/birthday-mailer-bomb-master.git
   ```
2. Configure SMTP settings in `index.php` (host, port, username, password).
3. Place your meme images in the `img/` directory.

## Usage

1. Open `index.html` in your browser or navigate to the folder URL.
2. Enter the target email address and number of emails to send.
3. Click **Send**. Each email will include a random meme from the `img/` folder.

## Warning

This tool is intended for educational or testing purposes only. Do not use it to harass or spam real users.

## License

ISC License. See [LICENSE](../LICENSE) for details.
