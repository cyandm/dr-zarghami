jQuery(document).ready(function ($) {
    let form = $("#comment-service-page");

    if (form) {
        form.submit(function (e) {
            e.preventDefault();
            $("#submit_form").prop("disabled", false);

            $("#success_message").html("");
            $("#fail_message").html("");
            var allData = {};



            form.find("input:not(:radio), textarea, select").each(function () {
                var inputName = $(this).attr("name");
                allData[inputName] = $(this).val();
            });
            var ratingValue = $('.rating input[name="rating"]:checked').val();
            if (ratingValue !== undefined) {
                allData['rating'] = ratingValue;
            } else {
                allData['rating'] = "";
            }
            console.log(allData);

            let errors = [];
            $.each(allData, function (key, value) {
                // input is empty
                if (value == "") {
                    let error = fieldName(key) + "  ضروری است ";

                    errors.push(error);
                }
                if (!value == "" && key != "phone") {
                    let errortext = sanitizeInput(value);
                    errors.push(errortext);
                }

                // is phone
                if (key == "phone" && !value == "") {
                    let phoneError = checkMobile(value);
                    errors.push(phoneError);
                }

                if (key == "service" && !value == "") {
                    if (!$.isNumeric(value)) {
                        let serviceError = fieldName(key) + "  را به درستی وارد کنید ";
                        errors.push(serviceError);
                    }
                }


                // errors.push(element);

                // is text function
                function sanitizeInput(input) {
                    const symbolsPattern =
                        /[\!\@\#\$\%\^\&\*\)\(\+\=\<\>\{\}\[\]\:\;\'\"\|\~\`\_\-]/;

                    if (input.match(symbolsPattern)) {
                        return "لطفا " + fieldName(key) + " مناسب وارد کنید ";
                    }
                }

                // validate Phone function
                function checkMobile(tel) {
                    const mobilePattern = /^(\+98|0)?9\d{9}$/;

                    if (!tel.match(mobilePattern)) {
                        return "لطفا شماره تلفن وارد کنید ";
                    }
                }

                function fieldName(fieldName) {
                    if (fieldName == "name") {
                        return "نام ";
                    }
                    if (fieldName == "phone") {
                        return "شماره تلفن ";
                    }
                    if (fieldName == "message") {
                        return " متن پیام";
                    }
                    if (fieldName == "service") {
                        return "انتخاب خدمات ";
                    }
                    if (fieldName == "rating") {
                        return "انتخاب امتیاز  ";
                    }
                }
            });
            console.log(errors);

            // Check if the array is empty or all elements are undefined
            function isArrayEmptyOrAllUndefined(array) {
                if (array.length === 0) {
                    return true; // The array is empty
                }

                for (const element of array) {
                    if (element !== undefined) {
                        return false; // If any element is defined, return false
                    }
                }
                return true; // If no element is defined, return true
            }

            if (isArrayEmptyOrAllUndefined(errors)) {
                let newSliders = JSON.stringify(allData);
                $.ajax({
                    url: ajax_var.url,
                    type: "post",
                    dataType: "json",
                    data: {
                        action: "testimonial_form",
                        _nonce: ajax_var.nonce,
                        data: allData,
                    },
                    success: function (response) {
                        if (response.success === true) {
                            console.log("true");
                            response.data;
                            $("#submit_form").prop("disabled", false);
                            form.find("input, textarea").each(function () {
                                $(this).val("");
                                $(this).attr("disabled", true);
                                $(this).addClass("disabled");
                                // $("#submit_form").hide();
                            });
                            $("#success_message").html(
                                response.message +
                                '<div class="form-message-close"><i class="icon-close"></i></div>'
                            );
                            $("#success_message").append("</ul>");
                            $("#success_message").addClass("show");
                        }
                    },
                    error: function (e) {
                        $("#fail_message").html(
                            "Sorry there is something wrong we are working on it :("
                        );
                    },
                });
            } else {
                $("#submit_form").prop("disabled", false);
                $("#fail_message").html("");
                $("#fail_message").append(
                    '<ul><div class="form-message-close"><i  class="icon-close"></i></div></ul>'
                );
                $.each(errors, function (k, v) {
                    if (v !== undefined) {
                        $("#fail_message ul").append("<li> - " + v + "</li>");
                    }
                });
                $("#fail_message").append("</ul>");
                $("#fail_message").addClass("show");
            }
        });

        $(".form-message-close").on("click", function (e) {
            e.preventDefault();
            closeToaster();
        });
        $("body").on("click", function (e) {
            closeToaster();
        });

        function closeToaster() {
            $(".form-message").removeClass("show");
        }
    }
});
