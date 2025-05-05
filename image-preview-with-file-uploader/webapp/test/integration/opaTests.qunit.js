/* global QUnit */
QUnit.config.autostart = false;

sap.ui.getCore().attachInit(function () {
	"use strict";

	sap.ui.require([
		"com/sap/image-preview-with-file-uploader/test/integration/AllJourneys"
	], function () {
		QUnit.start();
	});
});