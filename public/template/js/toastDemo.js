(function ($) {
  showSuccessToast = function () {
    "use strict";
    resetToastPosition();
    $.toast({
      heading: "Success",
      text: "And these were just the basic demos! Scroll down to check further details on how to customize the output.",
      showHideTransition: "slide",
      icon: "success",
      loaderBg: "#f96868",
      position: "top-right",
    });
  };
  showInfoToast = function () {
    "use strict";
    resetToastPosition();
    $.toast({
      heading: "Info",
      text: "And these were just the basic demos! Scroll down to check further details on how to customize the output.",
      showHideTransition: "slide",
      icon: "info",
      loaderBg: "#46c35f",
      position: "bottom-right",
    });
  };
  showWarningToastForProduct = function (alertMessageKurang) {
    "use strict";
    resetToastPosition();
    $.toast({
      heading: "STOK KURANG",
      text: `${alertMessageKurang}`,
      showHideTransition: "slide",
      icon: "warning",
      loaderBg: "#57c7d4",
      position: "bottom-right",
      hideAfter: 6000,
    });
  };
  showDangerToastForProduct = function (alertMessageKurang) {
    "use strict";
    resetToastPosition();
    $.toast({
      heading: "STOK KOSONG",
      text: `${alertMessageKurang}`,
      showHideTransition: "slide",
      icon: "error",
      loaderBg: "#6275CA", 
      position: "bottom-right",
      hideAfter: 6000, // Waktu tampilan dalam milidetik (misalnya 5000 untuk 5 detik)
    });
  };
  showToastPosition = function (position) {
    "use strict";
    resetToastPosition();
    $.toast({
      heading: "Positioning",
      text: "Specify the custom position object or use one of the predefined ones",
      position: String(position),
      icon: "info",
      stack: false,
      loaderBg: "#f96868",
    });
  };
  showToastInCustomPosition = function () {
    "use strict";
    resetToastPosition();
    $.toast({
      heading: "Custom positioning",
      text: "Specify the custom position object or use one of the predefined ones",
      icon: "info",
      position: {
        left: 120,
        top: 120,
      },
      stack: false,
      loaderBg: "#f96868",
    });
  };
  resetToastPosition = function () {
    $(".jq-toast-wrap").removeClass(
      "bottom-left bottom-right top-left top-right mid-center"
    ); // to remove previous position class
    $(".jq-toast-wrap").css({
      top: "",
      left: "",
      bottom: "",
      right: "",
    }); //to remove previous position style
  };
})(jQuery);
