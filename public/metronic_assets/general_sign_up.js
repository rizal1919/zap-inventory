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
                            if(a == "Valid"){
                                t.setAttribute("data-kt-indicator", "on");
                            }else{
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
                                            window.location.href = route('guestLogin');
                                        });
                                },
                                error: function (error) {

                                    if(error.status == 409){
                                        alert(error.responseJSON.message)
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
