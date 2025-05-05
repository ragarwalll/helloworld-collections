# IPA Installer

A SAP UI5–based web application that simplifies installing IPA files onto iOS devices. Upload your `.ipa` package and deploy it directly to a connected iPhone, with the file stored under the app’s `assets/` folder.

## 🚀 Features

- Drag-and-drop or file-dialog upload of `.ipa` files  
- Stores uploaded `.ipa` in `assets/ipas/` directory  
- Detects connected iOS devices via USB (requires `libimobiledevice`)  
- One-click installation to the target device

## 🎯 Prerequisites

- Node.js ≥ 14.x
- SAP UI5 (≥ 1.60)
- `libimobiledevice` CLI tools installed on your system
- A macOS or Linux machine with USB access to iOS devices

## ⚙️ Installation

1. Clone this repository into your workspace:
   ```bash
   git clone https://github.com/ragarwalll/helloworld-collections.git
   cd helloworld-collections/ipa-installer
   ```
2. Install npm dependencies:
   ```bash
   npm install
   ```
3. Build the UI5 application:
   ```bash
   npm run build
   ```
4. Serve the app locally:
   ```bash
   npm start
   ```

## 📦 Usage

1. Open the app in your browser at `http://localhost:8080`.
2. Drag and drop an `.ipa` file or click **Select File**.
3. The file is saved under `assets` and listed in the UI.
4. Click **Install** next to the desired `.ipa` entry. The app will invoke `ideviceinstaller` (part of `libimobiledevice`) to deploy the app to the connected iOS device.

## 🤝 Contributing

Bug reports and pull requests are welcome. Please fork the repo and submit your changes.

---

*Maintained by [ragarwalll](https://github.com/ragarwalll)*
