"use strict";
var KTSignupGeneral = (function () {
    var e,
        t,
        a,
        s,
        r = function () {
            return 100 === s.getScore();
        };
    return {
        init: function () {
            (e = document.querySelector("#kt_sign_up_form")),
                (t = document.querySelector("#kt_sign_up_submit")),
                (s = KTPasswordMeter.getInstance(
                    e.querySelector('[data-kt-password-meter="true"]')
                )),
                (a = FormValidation.formValidation(e, {
                    fields: {
                        fullname: {
                            validators: {
                                notEmpty: { message: "Full Name is required" },
                            },
                        },
                        username: {
                            validators: {
                                notEmpty: { message: "User Name is required" },
                            },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "The password is required",
                                },
                                callback: {
                                    message: "Please enter valid password",
                                    callback: function (e) {
                                        if (e.value.length > 0) return r();
                                    },
                                },
                            },
                        },
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger({
                            event: { password: !1 },
                        }),
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: "",
                        }),
                    },
                })),
                t.addEventListener("click", function (r) {
                    r.preventDefault(),
                        a.revalidateField("password"),
                        a.validate().then(function (a) {
                            if (a == "Valid") {
                                t.setAttribute("data-kt-indicator", "on");
                            } else {
                                t.disabled = !0;
                            }

                            var formData = new FormData(e);
                            const pathname = window.location.pathname;

                            $.ajax({
                                type: "POST",
                                url: route("storeUser"),
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    (t.disabled = !0),
                                        t.removeAttribute("data-kt-indicator"),
                                        (t.disabled = !1),
                                        Swal.fire({
                                            text: "Sign Up Success !",
                                            icon: "success",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        }).then(function (t) {
                                            window.location.href =
                                                route("guestLogin");
                                        });
                                },
                                error: function (error) {
                                    if (error.status == 409) {
                                        alert(error.responseJSON.message);
                                    }
                                    // console.log(error);
                                    t.removeAttribute("data-kt-indicator");
                                    (t.disabled = !1);

                                    // if (error.responseJSON.errors) {
                                    //     const errors = Object.values(
                                    //         error.responseJSON.errors
                                    //     );

                                    //     errors.forEach((element) => {
                                    //         toastr.error(element[0], options);
                                    //     });
                                    // } else {
                                    //     toastr.error(
                                    //         error.responseJSON.message,
                                    //         options
                                    //     );
                                    // }
                                },
                            });

                            // "Valid" == a
                            //     ? (t.setAttribute("data-kt-indicator", "on"),
                            //       (t.disabled = !0),
                            //       setTimeout(function () {
                            //           t.removeAttribute("data-kt-indicator"),
                            //               (t.disabled = !1),
                            //               Swal.fire({
                            //                   text: "You have successfully reset your password!",
                            //                   icon: "success",
                            //                   buttonsStyling: !1,
                            //                   confirmButtonText: "Ok, got it!",
                            //                   customClass: {
                            //                       confirmButton:
                            //                           "btn btn-primary",
                            //                   },
                            //               }).then(function (t) {
                            //                   t.isConfirmed &&
                            //                       (e.reset(), s.reset());
                            //               });
                            //       }, 1500))
                            //     : Swal.fire({
                            //           text: "Sorry, looks like there are some errors detected, please try again.",
                            //           icon: "error",
                            //           buttonsStyling: !1,
                            //           confirmButtonText: "Ok, got it!",
                            //           customClass: {
                            //               confirmButton: "btn btn-primary",
                            //           },
                            //       });
                        });
                }),
                e
                    .querySelector('input[name="password"]')
                    .addEventListener("input", function () {
                        this.value.length > 0 &&
                            a.updateFieldStatus("password", "NotValidated");
                    });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSignupGeneral.init();
    $("#close_eye").click(function (e) {
        $("#open_eye").removeClass("d-none");
        $("#close_eye").addClass("d-none");
        $("#password").prop("type", "text");
    });

    $("#open_eye").click(function (e) {
        $("#close_eye").removeClass("d-none");
        $("#open_eye").addClass("d-none");
        $("#password").prop("type", "password");
    });
});

particlesJS("particles-js", {
    "particles": {
      "number": {
        "value": 30,
        "density": {
          "enable": true,
          "value_area": 800
        }
      },
      "color": {
        "value": "#ffffff"
      },
      "shape": {
        "type": "circle",
        "stroke": {
          "width": 0,
          "color": "#000000"
        },
        "polygon": {
          "nb_sides": 5
        },
        "image": {
          "src": "img/github.svg",
          "width": 100,
          "height": 100
        }
      },
      "opacity": {
        "value": 0.5,
        "random": false,
        "anim": {
          "enable": false,
          "speed": 1,
          "opacity_min": 0.1,
          "sync": false
        }
      },
      "size": {
        "value": 3,
        "random": true,
        "anim": {
          "enable": false,
          "speed": 40,
          "size_min": 0.1,
          "sync": false
        }
      },
      "line_linked": {
        "enable": true,
        "distance": 150,
        "color": "#ffffff",
        "opacity": 0.4,
        "width": 1
      },
      "move": {
        "enable": true,
        "speed": 6,
        "direction": "none",
        "random": false,
        "straight": false,
        "out_mode": "out",
        "bounce": false,
        "attract": {
          "enable": false,
          "rotateX": 600,
          "rotateY": 1200
        }
      }
    },
    "interactivity": {
      "detect_on": "canvas",
      "events": {
        "onhover": {
          "enable": true,
          "mode": "grab"
        },
        "onclick": {
          "enable": true,
          "mode": "push"
        },
        "resize": true
      },
      "modes": {
        "grab": {
          "distance": 140,
          "line_linked": {
            "opacity": 1
          }
        },
        "bubble": {
          "distance": 400,
          "size": 40,
          "duration": 2,
          "opacity": 8,
          "speed": 3
        },
        "repulse": {
          "distance": 200,
          "duration": 0.4
        },
        "push": {
          "particles_nb": 4
        },
        "remove": {
          "particles_nb": 2
        }
      }
    },
    "retina_detect": true
  });
