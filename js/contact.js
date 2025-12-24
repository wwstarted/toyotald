document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contactForm");
  const submitBtn = form.querySelector(".submit-btn");

  function validateName(name) {
    return name.trim().length >= 2;
  }

  function validatePhone(phone) {
    const phoneRegex = /(84|0[3|5|7|8|9])+([0-9]{8})\b/;
    return phoneRegex.test(phone.replace(/\s/g, ""));
  }

  function validateEmail(email) {
    if (!email) return true;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  function showError(input, message) {
    const formGroup = input.closest(".form-group");
    formGroup.classList.add("error");
    const errorMsg = formGroup.querySelector(".error-message");
    if (errorMsg && message) {
      errorMsg.textContent = message;
    }
  }
  function hideError(input) {
    const formGroup = input.closest(".form-group");
    formGroup.classList.remove("error");
  }

  function validateField(field) {
    const name = field.name;
    const value = field.value;

    switch (name) {
      case "fullname":
        if (!validateName(value)) {
          showError(field, "Vui lòng nhập họ tên (tối thiểu 2 ký tự)");
          return false;
        }
        break;

      case "phone":
        if (!validatePhone(value)) {
          showError(field, "Số điện thoại không hợp lệ");
          return false;
        }
        break;

      case "email":
        if (!validateEmail(value)) {
          showError(field, "Email không hợp lệ");
          return false;
        }
        break;

      case "car_model":
        if (!value) {
          showError(field, "Vui lòng chọn dòng xe");
          return false;
        }
        break;
    }

    hideError(field);
    return true;
  }

  form.querySelectorAll("input, select, textarea").forEach((input) => {
    input.addEventListener("blur", function () {
      validateField(this);
    });

    input.addEventListener("input", function () {
      if (this.closest(".form-group").classList.contains("error")) {
        validateField(this);
      }
    });
  });

  /**
   * Hiển thị toast notification
   * @param {string} message
   * @param {string} type
   */
  function showToast(message, type = "success") {
    const toast = document.createElement("div");
    toast.className = `toast ${type}`;
    toast.innerHTML = `
            <div class="toast-icon">${type === "success" ? "✓" : "✕"}</div>
            <div class="toast-message">${message}</div>
        `;

    document.body.appendChild(toast);

    setTimeout(() => toast.classList.add("show"), 100);

    setTimeout(() => {
      toast.classList.remove("show");
      setTimeout(() => toast.remove(), 300);
    }, 3000);
  }

  form.addEventListener("submit", async function (e) {
    e.preventDefault();

    let isValid = true;
    const requiredFields = form.querySelectorAll("[required]");

    requiredFields.forEach((field) => {
      if (!validateField(field)) {
        isValid = false;
      }
    });

    if (!isValid) {
      showToast("Vui lòng kiểm tra lại thông tin", "error");

      const firstError = form.querySelector(".form-group.error");
      if (firstError) {
        firstError.scrollIntoView({ behavior: "smooth", block: "center" });
      }
      return;
    }

    const formData = new FormData(form);
    const data = Object.fromEntries(formData);

    submitBtn.disabled = true;
    submitBtn.classList.add("loading");

    try {
      const response = await fetch(ajaxurl, {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: new URLSearchParams({
          action: "submit_contact_form",
          nonce: '<?php echo wp_create_nonce("contact_form_nonce"); ?>', // Bạn sẽ thêm nonce từ PHP
          ...data,
        }),
      });

      const result = await response.json();

      if (result.success) {
        // Thành công
        showToast(
          "Gửi thông tin thành công! Chúng tôi sẽ liên hệ bạn sớm nhất.",
          "success"
        );
        form.reset();
      } else {
        showToast(
          result.data.message || "Có lỗi xảy ra. Vui lòng thử lại!",
          "error"
        );
      }
    } catch (error) {
      console.error("Submit error:", error);
      showToast("Có lỗi xảy ra. Vui lòng thử lại sau!", "error");
    } finally {
      submitBtn.disabled = false;
      submitBtn.classList.remove("loading");
    }
  });

  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      const href = this.getAttribute("href");
      if (href === "#" || href === "") return;

      e.preventDefault();
      const target = document.querySelector(href);

      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  console.log("Contact form initialized successfully");
  console.log(
    "Ajax URL:",
    typeof ajaxurl !== "undefined" ? ajaxurl : "Not defined"
  );
});
