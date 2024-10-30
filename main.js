(function polyfill() {
  const relList = document.createElement("link").relList;
  if (relList && relList.supports && relList.supports("modulepreload")) {
    return;
  }
  for (const link of document.querySelectorAll('link[rel="modulepreload"]')) {
    processPreload(link);
  }
  new MutationObserver((mutations) => {
    for (const mutation of mutations) {
      if (mutation.type !== "childList") {
        continue;
      }
      for (const node of mutation.addedNodes) {
        if (node.tagName === "LINK" && node.rel === "modulepreload")
          processPreload(node);
      }
    }
  }).observe(document, { childList: true, subtree: true });
  function getFetchOpts(link) {
    const fetchOpts = {};
    if (link.integrity) fetchOpts.integrity = link.integrity;
    if (link.referrerPolicy) fetchOpts.referrerPolicy = link.referrerPolicy;
    if (link.crossOrigin === "use-credentials")
      fetchOpts.credentials = "include";
    else if (link.crossOrigin === "anonymous") fetchOpts.credentials = "omit";
    else fetchOpts.credentials = "same-origin";
    return fetchOpts;
  }
  function processPreload(link) {
    if (link.ep)
      return;
    link.ep = true;
    const fetchOpts = getFetchOpts(link);
    fetch(link.href, fetchOpts);
  }
})();
const initNav = () => {
  document.querySelector("body");
  const headerPopupMenu = document.querySelector(".header__popup-menu");
  const menuBtn = document.querySelector(".menu-button");
  menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle("is-active");
    headerPopupMenu.classList.toggle("is-active");
  });
  const cartBtn = document.querySelector(".header__cart-button");
  const miniCardPopup = document.querySelector(".header__minicart-popup");
  cartBtn.addEventListener("click", (event) => {
    miniCardPopup.classList.toggle("is-active");
    if (miniCardPopup.classList.contains("is-active")) {
      document.body.addEventListener("click", closeMiniCartOnClickOutside);
    } else {
      document.body.removeEventListener("click", closeMiniCartOnClickOutside);
    }
  });
  function closeMiniCartOnClickOutside(event) {
    if (!miniCardPopup.contains(event.target) && !cartBtn.contains(event.target)) {
      miniCardPopup.classList.remove("is-active");
      document.body.removeEventListener("click", closeMiniCartOnClickOutside);
    }
  }
};
const initAccordions = () => {
  if (innerWidth <= 560) {
    const accordions = document.querySelectorAll(".header__catalog-menu>li");
    console.log(accordions);
    accordions.forEach((el) => {
      const button = el.querySelector(".header__catalog-menu>li>a");
      const content = el.querySelector(".submenu");
      button.addEventListener("click", (evt) => {
        evt.preventDefault();
        const currentButton = evt.currentTarget;
        currentButton.classList.toggle("_active");
        content.classList.toggle("_active");
        if (currentButton.classList.contains("_active")) {
          content.style.maxHeight = content.scrollHeight + "px";
        } else {
          content.style.maxHeight = null;
        }
      });
    });
  }
};
const initSlider = () => {
  const feedback = document.querySelector(".hero-swiper");
  if (feedback) {
    new Swiper(".hero-swiper", {
      loop: true,
      slidesPerView: 1,
      spaceBetween: 20,
      // navigation: {
      //     nextEl: '.swiper-button-next',
      //     prevEl: '.swiper-button-prev',
      // },
      pagination: {
        el: ".swiper-pagination",
        type: "bullets",
        clickable: true
      }
    });
  }
  const categorySlider = document.querySelector(".category-section-swiper");
  if (categorySlider) {
    new Swiper(".category-section-swiper", {
      loop: true,
      spaceBetween: 20,
      breakpoints: {
        320: {
          slidesPerView: 1
        },
        340: {
          slidesPerView: 2
        },
        768: {
          slidesPerView: 3
        },
        1023: {
          slidesPerView: 4
        }
      },
      navigation: {
        nextEl: ".swiper-button-next-new",
        prevEl: ".swiper-button-prev-new"
      }
    });
  }
  const popularSlider = document.querySelector(".popular-section-swiper");
  if (popularSlider) {
    new Swiper(".popular-section-swiper", {
      loop: true,
      spaceBetween: 20,
      breakpoints: {
        320: {
          slidesPerView: 1
        },
        340: {
          slidesPerView: 2
        },
        768: {
          slidesPerView: 3
        },
        1023: {
          slidesPerView: 4
        }
      },
      navigation: {
        nextEl: ".swiper-button-next-popular",
        prevEl: ".swiper-button-prev-popular"
      }
    });
  }
  const brandsSlider = document.querySelector(".brands-section-swiper");
  if (brandsSlider) {
    new Swiper(".brands-section-swiper", {
      loop: true,
      // spaceBetween: 20,
      breakpoints: {
        320: {
          slidesPerView: 2
        },
        340: {
          slidesPerView: 2
        },
        450: {
          slidesPerView: 4
        },
        768: {
          slidesPerView: 5
        },
        1023: {
          slidesPerView: 6
        }
      },
      navigation: {
        nextEl: ".swiper-button-next-brands",
        prevEl: ".swiper-button-prev-brands"
      }
    });
  }
};
const initButtonAnimation = () => {
  const buttons = document.querySelectorAll("._anim-button");
  buttons.forEach((button) => {
    const text = button.textContent.trim();
    button.innerHTML = "";
    let indexWithoutSpaces = 0;
    text.split("").forEach((char) => {
      const span = document.createElement("span");
      if (char === " ") {
        span.innerHTML = "&nbsp;";
      } else {
        span.textContent = char;
        if (indexWithoutSpaces % 2 === 0) {
          span.classList.add("even");
        } else {
          span.classList.add("odd");
        }
        indexWithoutSpaces++;
      }
      button.appendChild(span);
    });
    button.addEventListener("mouseover", () => {
      button.querySelectorAll("span").forEach((span, index) => {
        if (!span.classList.contains("space")) {
          span.classList.add("animate");
        }
      });
    });
    button.addEventListener("mouseleave", () => {
      button.querySelectorAll("span").forEach((span) => {
        span.classList.remove("animate");
        span.style.animationDelay = "";
      });
    });
  });
};
const initCurrentYear = () => {
  const year = (/* @__PURE__ */ new Date()).getFullYear();
  const element = document.querySelector(".data-span");
  if (element) {
    element.innerText = year;
  }
};
const initScrollAnimation = () => {
  var ScrollOut = /* @__PURE__ */ function() {
    function S(e2, t2, n2) {
      return e2 < t2 ? t2 : n2 < e2 ? n2 : e2;
    }
    function T(e2) {
      return +(0 < e2) - +(e2 < 0);
    }
    var q, t = {};
    function n(e2) {
      return "-" + e2[0].toLowerCase();
    }
    function d(e2) {
      return t[e2] || (t[e2] = e2.replace(/([A-Z])/g, n));
    }
    function v(e2, t2) {
      return e2 && 0 !== e2.length ? e2.nodeName ? [e2] : [].slice.call(e2[0].nodeName ? e2 : (t2 || document.documentElement).querySelectorAll(e2)) : [];
    }
    function h(e2, t2) {
      for (var n2 in t2) n2.indexOf("_") && e2.setAttribute("data-" + d(n2), t2[n2]);
    }
    var z = [];
    function e() {
      q = 0, z.slice().forEach(function(e2) {
        return e2();
      }), F();
    }
    function F() {
      !q && z.length && (q = requestAnimationFrame(e));
    }
    function N(e2, t2, n2, r) {
      return "function" == typeof e2 ? e2(t2, n2, r) : e2;
    }
    function m() {
    }
    return function(L) {
      var i, P, _, H, o = (L = L || {}).onChange || m, l = L.onHidden || m, c = L.onShown || m, s = L.onScroll || m, f = L.cssProps ? (i = L.cssProps, function(e3, t3) {
        for (var n3 in t3) n3.indexOf("_") && (true === i || i[n3]) && e3.style.setProperty("--" + d(n3), (r2 = t3[n3], Math.round(1e4 * r2) / 1e4));
        var r2;
      }) : m, e2 = L.scrollingElement, A = e2 ? v(e2)[0] : window, W = e2 ? v(e2)[0] : document.documentElement, x = false, O = {}, y = [];
      function t2() {
        y = v(L.targets || "[data-scroll]", v(L.scope || W)[0]).map(function(e3) {
          return { element: e3 };
        });
      }
      function n2() {
        var e3 = W.clientWidth, t3 = W.clientHeight, n3 = T(-P + (P = W.scrollLeft || window.pageXOffset)), r2 = T(-_ + (_ = W.scrollTop || window.pageYOffset)), i2 = W.scrollLeft / (W.scrollWidth - e3 || 1), o2 = W.scrollTop / (W.scrollHeight - t3 || 1);
        x = x || O.scrollDirX !== n3 || O.scrollDirY !== r2 || O.scrollPercentX !== i2 || O.scrollPercentY !== o2, O.scrollDirX = n3, O.scrollDirY = r2, O.scrollPercentX = i2, O.scrollPercentY = o2;
        for (var l2, c2 = false, s2 = 0; s2 < y.length; s2++) {
          for (var f2 = y[s2], u2 = f2.element, a2 = u2, d2 = 0, v2 = 0; d2 += a2.offsetLeft, v2 += a2.offsetTop, (a2 = a2.offsetParent) && a2 !== A; ) ;
          var h2 = u2.clientHeight || u2.offsetHeight || 0, m2 = u2.clientWidth || u2.offsetWidth || 0, g = (S(d2 + m2, P, P + e3) - S(d2, P, P + e3)) / m2, p = (S(v2 + h2, _, _ + t3) - S(v2, _, _ + t3)) / h2, w = 1 === g ? 0 : T(d2 - P), X = 1 === p ? 0 : T(v2 - _), Y = S((P - (m2 / 2 + d2 - e3 / 2)) / (e3 / 2), -1, 1), b = S((_ - (h2 / 2 + v2 - t3 / 2)) / (t3 / 2), -1, 1), D = void 0;
          D = L.offset ? N(L.offset, u2, f2, W) > _ ? 0 : 1 : (N(L.threshold, u2, f2, W) || 0) < g * p ? 1 : 0;
          var E = f2.visible !== D;
          (f2._changed || E || f2.visibleX !== g || f2.visibleY !== p || f2.index !== s2 || f2.elementHeight !== h2 || f2.elementWidth !== m2 || f2.offsetX !== d2 || f2.offsetY !== v2 || f2.intersectX != f2.intersectX || f2.intersectY != f2.intersectY || f2.viewportX !== Y || f2.viewportY !== b) && (c2 = true, f2._changed = true, f2._visibleChanged = E, f2.visible = D, f2.elementHeight = h2, f2.elementWidth = m2, f2.index = s2, f2.offsetX = d2, f2.offsetY = v2, f2.visibleX = g, f2.visibleY = p, f2.intersectX = w, f2.intersectY = X, f2.viewportX = Y, f2.viewportY = b, f2.visible = D);
        }
        H || !x && !c2 || (l2 = C, z.push(l2), F(), H = function() {
          !(z = z.filter(function(e4) {
            return e4 !== l2;
          })).length && q && (cancelAnimationFrame(q), q = 0);
        });
      }
      function C() {
        u(), x && (x = false, h(W, { scrollDirX: O.scrollDirX, scrollDirY: O.scrollDirY }), f(W, O), s(W, O, y));
        for (var e3 = y.length - 1; -1 < e3; e3--) {
          var t3 = y[e3], n3 = t3.element, r2 = t3.visible, i2 = n3.hasAttribute("scrollout-once") || false;
          t3._changed && (t3._changed = false, f(n3, t3)), t3._visibleChanged && (h(n3, { scroll: r2 ? "in" : "out" }), o(n3, t3, W), (r2 ? c : l)(n3, t3, W)), r2 && (L.once || i2) && y.splice(e3, 1);
        }
      }
      function u() {
        H && (H(), H = void 0);
      }
      t2(), n2(), C();
      var r = 0, a = function() {
        r = r || setTimeout(function() {
          r = 0, n2();
        }, 0);
      };
      return window.addEventListener("resize", a), A.addEventListener("scroll", a), { index: t2, update: n2, teardown: function() {
        u(), window.removeEventListener("resize", a), A.removeEventListener("scroll", a);
      } };
    };
  }();
  ScrollOut();
};
window.addEventListener("DOMContentLoaded", () => {
  console.log("подключен скрипт main.js");
  initNav();
  initAccordions();
  initSlider();
  initButtonAnimation();
  initCurrentYear();
  initScrollAnimation();
});
