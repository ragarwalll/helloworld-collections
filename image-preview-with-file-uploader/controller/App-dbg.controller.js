sap.ui.define([
	"sap/ui/core/mvc/Controller"
], function (Controller) {
	"use strict";

	return Controller.extend("com.sap.image-preview-with-file-uploader.controller.App", {
		onInit: function () {

		},
		/*
		 * function called
		 * when tile clicked
		 */
		onEditImage: function (oEvent) {
			if (oEvent.getParameter("action") === "Press") {
				this.getView().byId("fileUploader-label").getDomRef().click();
			} else if (oEvent.getParameter("action") === "Remove") {
				this.getView().byId("actionIcon").setSrc("sap-icon://add");
				this.getView().byId("image").setSubheader("No Image Selected");
				this.getView().byId("image").setBackgroundImage("");
			}
		},
		onChangeImage: function (oEvent) {
			if (oEvent.getSource().oFileUpload.files.length > 0) {
				var file = oEvent.getSource().oFileUpload.files[0];
				var path = URL.createObjectURL(file);
				this.getView().byId("image").setBackgroundImage(path);
				this.getView().byId("image").setSubheader("");
				this.getView().byId("actionIcon").setSrc("sap-icon://edit");
			}
		}
	});
});