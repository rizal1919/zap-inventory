"use strict";
var KTSigninGeneral = (function () {
    var t, e, i;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                (e = document.querySelector("#kt_sign_in_submit")),
                (i = FormValidation.formValidation(t, {
                    fields: {
                        // email: {
                        //     validators: {
                        //         notEmpty: {
                        //             message: "Email address is required",
                        //         },
                        //         emailAddress: {
                        //             message:
                        //                 "The value is not a valid email address",
                        //         },
                        //     },
                        // },
                        username: {
                          validators: {
                              notEmpty: { message: "User Name is required" },
                          },
                        },
                        password: {
                            validators: {
                                notEmpty: {
                                    message: "Password is required",
                                },
                            },
                        },
                    },
                    plugins: {
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                        }),
                    },
                })),
                e.addEventListener("click", function (n) {
                    n.preventDefault(),
                        i.validate().then(function (i) {

                            if(i == "Valid"){
                                e.setAttribute("data-kt-indicator", "on");
                            }else{
                                e.disabled = !0;
                            }

                            var formData = new FormData(t);
                            const pathname = window.location.pathname;

                            $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                type: "POST",
                                url: route("loginStart"),
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                    console.log(response);
                                    (e.disabled = !0),
                                    e.removeAttribute("data-kt-indicator"),
                                    (e.disabled = !1),
                                    Swal.fire({
                                        text: "Login Berhasil!",
                                        icon: "success",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton:
                                            "btn btn-primary",
                                        },
                                    }).then(function (t) {
                                            window.location.href = route('dashboard');
                                        });
                                },
                                error: function (error) {
                                    toastr.error('Data pengguna tidak ditemukan', 'Login Gagal!')
                                    e.removeAttribute("data-kt-indicator");
                                    (e.disabled = !1);

                                    if (error.responseJSON.errors) {
                                        const errors = Object.values(
                                            error.responseJSON.errors
                                        );

                                        errors.forEach((element) => {
                                            toastr.error(element[0], options);
                                        });
                                    } else {
                                        toastr.error(
                                            error.responseJSON.message,
                                            options
                                        );
                                    }
                                },
                            });

                                //   setTimeout(function () {
                                //       e.removeAttribute("data-kt-indicator"),
                                //           (e.disabled = !1),
                                //           Swal.fire({
                                //               text: "You have successfully logged in!",
                                //               icon: "success",
                                //               buttonsStyling: !1,
                                //               confirmButtonText: "Ok, got it!",
                                //               customClass: {
                                //                   confirmButton:
                                //                       "btn btn-primary",
                                //               },
                                //           }).then(function (e) {
                                //               if (e.isConfirmed) {
                                //                 (t.querySelector('[name="email"]').value = "");
                                //                 (t.querySelector('[name="password"]').value = "");
                                //                 var i = t.getAttribute("data-kt-redirect-url");
                                //                 i && (location.href = i);
                                //               }
                                //           });
                                //   }, 2e3))
                                // : Swal.fire({
                                //       text: "Sorry, looks like there are some errors detected, please try again.",
                                //       icon: "error",
                                //       buttonsStyling: !1,
                                //       confirmButtonText: "Ok, got it!",
                                //       customClass: {
                                //           confirmButton: "btn btn-primary",
                                //       },
                                //   });
                        });
                });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
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
