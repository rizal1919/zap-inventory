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
            (e = document.querySelector("#profile_form")),
                (t = document.querySelector("#profile_submit")),
                (a = FormValidation.formValidation(e, {
                    fields: {
                        place: {
                            validators: {
                                notEmpty: {
                                    message: "Nama tempat wajib diisi",
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
                        a.validate().then(function (a) {
                            if (a == "Valid") {
                                t.setAttribute("data-kt-indicator", "on");
                            }

                            var formData = new FormData(e);
                            const pathname = window.location.pathname;

                            $.ajax({
                                type: "POST",
                                url: route("storePosition"),
                                data: formData,
                                processData: false,
                                contentType: false,
                                success: function (response) {
                                        (t.disabled = !0),
                                        t.removeAttribute("data-kt-indicator"),
                                        (t.disabled = !1),
                                        Swal.fire({
                                            text: response.message,
                                            icon: "success",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Terimakasih!",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        }).then(function (t) {
                                            window.location.href = route('position')
                                        });
                                },
                                error: function (error) {
                                    if (error.status == 409) {
                                        Swal.fire({
                                            title: error.responseJSON.message,
                                            text: "Silahkan klik tombol selesai pada menu posisi",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok",
                                            customClass: {
                                                confirmButton:
                                                    "btn btn-primary",
                                            },
                                        }).then(function (t) {
                                            window.location.href = route('position')
                                        });
                                    }
                                    // console.log(error);
                                    t.removeAttribute("data-kt-indicator");

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
});
