"use strict";
/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
(self["webpackChunkcar_rental_frontend"] = self["webpackChunkcar_rental_frontend"] || []).push([["src_modules_admin_views_BookingHistoryPage_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./src/modules/admin/views/BookingHistoryPage.vue?vue&type=script&setup=true&lang=js":
/*!************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./src/modules/admin/views/BookingHistoryPage.vue?vue&type=script&setup=true&lang=js ***!
  \************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var core_js_modules_es_array_push_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.push.js */ \"./node_modules/core-js/modules/es.array.push.js\");\n/* harmony import */ var core_js_modules_es_array_push_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_push_js__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _global_composables_http_service__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @/global-composables/http_service */ \"./src/global-composables/http_service.js\");\n/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue */ \"./node_modules/vue/dist/vue.runtime.esm-bundler.js\");\n/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! vue-router */ \"./node_modules/vue-router/dist/vue-router.mjs\");\n/* harmony import */ var _components_vehciles_composables_vehcile_composables__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../components/vehciles/composables/vehcile-composables */ \"./src/modules/admin/components/vehciles/composables/vehcile-composables.js\");\n/* harmony import */ var _components_vehciles_modals_CreatevehicleModal_vue__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../components/vehciles/modals/CreatevehicleModal.vue */ \"./src/modules/admin/components/vehciles/modals/CreatevehicleModal.vue\");\n/* harmony import */ var _components_SelectStatusFilter_vue__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! @/components/SelectStatusFilter.vue */ \"./src/components/SelectStatusFilter.vue\");\n/* harmony import */ var _components_GSkeletonLoading_vue__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! @/components/GSkeletonLoading.vue */ \"./src/components/GSkeletonLoading.vue\");\n/* harmony import */ var _components_GPagination_vue__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @/components/GPagination.vue */ \"./src/components/GPagination.vue\");\n/* harmony import */ var _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! @heroicons/vue/20/solid */ \"./node_modules/@heroicons/vue/20/solid/esm/CheckCircleIcon.js\");\n/* harmony import */ var _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! @heroicons/vue/20/solid */ \"./node_modules/@heroicons/vue/20/solid/esm/EyeIcon.js\");\n/* harmony import */ var _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! @heroicons/vue/20/solid */ \"./node_modules/@heroicons/vue/20/solid/esm/XCircleIcon.js\");\n/* harmony import */ var _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! @heroicons/vue/20/solid */ \"./node_modules/@heroicons/vue/20/solid/esm/XMarkIcon.js\");\n/* harmony import */ var _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! @heroicons/vue/20/solid */ \"./node_modules/@heroicons/vue/20/solid/esm/PlusCircleIcon.js\");\n/* harmony import */ var _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! @heroicons/vue/20/solid */ \"./node_modules/@heroicons/vue/20/solid/esm/ArrowUturnLeftIcon.js\");\n/* harmony import */ var _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! @heroicons/vue/20/solid */ \"./node_modules/@heroicons/vue/20/solid/esm/DocumentTextIcon.js\");\n/* harmony import */ var _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! @heroicons/vue/20/solid */ \"./node_modules/@heroicons/vue/20/solid/esm/ExclamationCircleIcon.js\");\n/* harmony import */ var _components_composables_booking_composables__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../components/composables/booking-composables */ \"./src/modules/admin/components/composables/booking-composables.js\");\n/* harmony import */ var _components_modals_AcceptBookingModal_vue__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ../components/modals/AcceptBookingModal.vue */ \"./src/modules/admin/components/modals/AcceptBookingModal.vue\");\n/* harmony import */ var _components_GNotification_vue__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! @/components/GNotification.vue */ \"./src/components/GNotification.vue\");\n/* harmony import */ var _components_modals_ReturnBookingModal_vue__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../components/modals/ReturnBookingModal.vue */ \"./src/modules/admin/components/modals/ReturnBookingModal.vue\");\n/* harmony import */ var _composables_admin_download_composables__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ../composables/admin-download-composables */ \"./src/modules/admin/composables/admin-download-composables.js\");\n/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! moment */ \"./node_modules/moment/moment.js\");\n/* harmony import */ var moment__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(moment__WEBPACK_IMPORTED_MODULE_13__);\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n/* harmony default export */ __webpack_exports__[\"default\"] = ({\n  __name: 'BookingHistoryPage',\n  setup(__props, {\n    expose\n  }) {\n    expose();\n    const router = (0,vue_router__WEBPACK_IMPORTED_MODULE_14__.useRouter)();\n    const openModal = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(false);\n    const bookings = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)([]);\n    const loading = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(true);\n    const total = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(0);\n    const params = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)({\n      page_size: 10,\n      page: 1,\n      search: null\n    });\n    const showNotif = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(false);\n    const message = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)('');\n    const selectedBooking = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(null);\n    const showReturnedModal = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(false);\n    const totalPaidByUser = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(0);\n    const url = (0,_global_composables_http_service__WEBPACK_IMPORTED_MODULE_1__.storageUrl)();\n    const tabs = [{\n      name: 'Booking',\n      href: '#',\n      current: true\n    }, {\n      name: 'Tracking',\n      href: '#',\n      current: false\n    }];\n    const handleClickAddVehicle = () => {\n      openModal.value = true;\n    };\n    const handleCloseModal = () => {\n      openModal.value = false;\n      showReturnedModal.value = false;\n      totalPaidByUser.value = 0;\n      selectedBooking.value = null;\n    };\n    const fetch = async () => {\n      loading.value = true;\n      const {\n        data,\n        load,\n        totalBookings\n      } = (0,_components_composables_booking_composables__WEBPACK_IMPORTED_MODULE_8__.loadAllBookingHistory)(params.value);\n      await load();\n      bookings.value = data.value;\n      total.value = totalBookings.value;\n      loading.value = false;\n    };\n    const handleAcceptBook = book => {\n      selectedBooking.value = book;\n      openModal.value = true;\n    };\n    const handleUserName = user => {\n      return user.last_name + ', ' + user.first_name;\n    };\n    const handleLickUser = user => {\n      router.push({\n        name: 'Admin User Profile',\n        params: {\n          id: user.id\n        }\n      });\n    };\n    const handleVehicleName = vehicle => {\n      return vehicle.model + ' - ' + vehicle.vehicle_brand.name;\n    };\n    const handleVehicleTracker = vehicle => {\n      return vehicle.tracker.name;\n    };\n    const handleDestination = destination => {\n      return destination.place.name;\n    };\n    const handleChangeSize = size => {\n      params.value.page_size = size;\n    };\n    const formatDateTime = dateTime => {\n      return moment__WEBPACK_IMPORTED_MODULE_13___default()(dateTime).format('MMM D YYYY h:mm a');\n    };\n    const handleChangePage = page => {\n      params.value.page = page;\n    };\n    const handleReturnVehicle = (book, index) => {\n      book.payments.forEach(payment => {\n        totalPaidByUser.value = parseFloat(totalPaidByUser.value + parseFloat(payment.price).toFixed(2)).toFixed(2);\n      });\n      showReturnedModal.value = true;\n      selectedBooking.value = book;\n    };\n    const handleClickOverdue = async book => {\n      const {\n        notify,\n        hasError\n      } = (0,_components_composables_booking_composables__WEBPACK_IMPORTED_MODULE_8__.notofyOverdue)(book);\n      await notify();\n      if (!hasError) {\n        showNotif.value = true;\n        message.value = 'Successfully notify user for overdue.';\n        setTimeout(() => {\n          showNotif.value = false;\n        }, 2000);\n      }\n    };\n    const handleClickTransactionForm = async (book, index) => {\n      await (0,_composables_admin_download_composables__WEBPACK_IMPORTED_MODULE_12__.downloadTransactionForm)(book.id).then(res => {\n        console.log(res, 'asda');\n        const url = window.URL.createObjectURL(new Blob([res.data]));\n        const link = document.createElement('a');\n        link.href = url;\n        link.setAttribute('download', `${book.user.first_name} - ${book.user.last_name} - transaction-form.pdf`);\n        document.body.appendChild(link);\n        link.click();\n      });\n    };\n    const handleClickAgreement = async (book, index) => {\n      await (0,_composables_admin_download_composables__WEBPACK_IMPORTED_MODULE_12__.downloadAgreement)(book.id).then(res => {\n        console.log(res, 'asda');\n        const url = window.URL.createObjectURL(new Blob([res.data]));\n        const link = document.createElement('a');\n        link.href = url;\n        link.setAttribute('download', `${book.user.first_name} - ${book.user.last_name} - agreement.pdf`);\n        document.body.appendChild(link);\n        link.click();\n      });\n    };\n    const handleClickReturned = book => {\n      let index = bookings.value.findIndex(b => b.id == book.id);\n      bookings.value.splice(index, 1);\n      showReturnedModal.value = false;\n      showNotif.value = true;\n      message.value = 'Successully returned';\n      setTimeout(() => {\n        showNotif.value = false;\n      }, 2000);\n    };\n    (0,vue__WEBPACK_IMPORTED_MODULE_2__.onMounted)(async () => {\n      fetch();\n    });\n    (0,vue__WEBPACK_IMPORTED_MODULE_2__.watch)(params.value, () => {\n      fetch();\n    });\n    const __returned__ = {\n      router,\n      openModal,\n      bookings,\n      loading,\n      total,\n      params,\n      showNotif,\n      message,\n      selectedBooking,\n      showReturnedModal,\n      totalPaidByUser,\n      url,\n      tabs,\n      handleClickAddVehicle,\n      handleCloseModal,\n      fetch,\n      handleAcceptBook,\n      handleUserName,\n      handleLickUser,\n      handleVehicleName,\n      handleVehicleTracker,\n      handleDestination,\n      handleChangeSize,\n      formatDateTime,\n      handleChangePage,\n      handleReturnVehicle,\n      handleClickOverdue,\n      handleClickTransactionForm,\n      handleClickAgreement,\n      handleClickReturned,\n      get storageUrl() {\n        return _global_composables_http_service__WEBPACK_IMPORTED_MODULE_1__.storageUrl;\n      },\n      onMounted: vue__WEBPACK_IMPORTED_MODULE_2__.onMounted,\n      ref: vue__WEBPACK_IMPORTED_MODULE_2__.ref,\n      watch: vue__WEBPACK_IMPORTED_MODULE_2__.watch,\n      get useRouter() {\n        return vue_router__WEBPACK_IMPORTED_MODULE_14__.useRouter;\n      },\n      get fetchVehicles() {\n        return _components_vehciles_composables_vehcile_composables__WEBPACK_IMPORTED_MODULE_3__.fetchVehicles;\n      },\n      CreatevehicleModal: _components_vehciles_modals_CreatevehicleModal_vue__WEBPACK_IMPORTED_MODULE_4__[\"default\"],\n      SelectStatusFilter: _components_SelectStatusFilter_vue__WEBPACK_IMPORTED_MODULE_5__[\"default\"],\n      GSkeletonLoading: _components_GSkeletonLoading_vue__WEBPACK_IMPORTED_MODULE_6__[\"default\"],\n      GPagination: _components_GPagination_vue__WEBPACK_IMPORTED_MODULE_7__[\"default\"],\n      get CheckCircleIcon() {\n        return _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_15__[\"default\"];\n      },\n      get EyeIcon() {\n        return _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_16__[\"default\"];\n      },\n      get XCircleIcon() {\n        return _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_17__[\"default\"];\n      },\n      get XMarkIcon() {\n        return _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_18__[\"default\"];\n      },\n      get PlusCircleIcon() {\n        return _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_19__[\"default\"];\n      },\n      get ArrowUturnLeftIcon() {\n        return _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_20__[\"default\"];\n      },\n      get DocumentTextIcon() {\n        return _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_21__[\"default\"];\n      },\n      get ExclamationCircleIcon() {\n        return _heroicons_vue_20_solid__WEBPACK_IMPORTED_MODULE_22__[\"default\"];\n      },\n      get loadAllBookingHistory() {\n        return _components_composables_booking_composables__WEBPACK_IMPORTED_MODULE_8__.loadAllBookingHistory;\n      },\n      get loadBookings() {\n        return _components_composables_booking_composables__WEBPACK_IMPORTED_MODULE_8__.loadBookings;\n      },\n      get loadDeployedBookings() {\n        return _components_composables_booking_composables__WEBPACK_IMPORTED_MODULE_8__.loadDeployedBookings;\n      },\n      get notofyOverdue() {\n        return _components_composables_booking_composables__WEBPACK_IMPORTED_MODULE_8__.notofyOverdue;\n      },\n      AcceptBookingModal: _components_modals_AcceptBookingModal_vue__WEBPACK_IMPORTED_MODULE_9__[\"default\"],\n      GNotification: _components_GNotification_vue__WEBPACK_IMPORTED_MODULE_10__[\"default\"],\n      ReturnBookingModal: _components_modals_ReturnBookingModal_vue__WEBPACK_IMPORTED_MODULE_11__[\"default\"],\n      get downloadAgreement() {\n        return _composables_admin_download_composables__WEBPACK_IMPORTED_MODULE_12__.downloadAgreement;\n      },\n      get downloadTransactionForm() {\n        return _composables_admin_download_composables__WEBPACK_IMPORTED_MODULE_12__.downloadTransactionForm;\n      },\n      get moment() {\n        return (moment__WEBPACK_IMPORTED_MODULE_13___default());\n      }\n    };\n    Object.defineProperty(__returned__, '__isScriptSetup', {\n      enumerable: false,\n      value: true\n    });\n    return __returned__;\n  }\n});\n\n//# sourceURL=webpack://car-rental-frontend/./src/modules/admin/views/BookingHistoryPage.vue?./node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use%5B0%5D!./node_modules/vue-loader/dist/index.js??ruleSet%5B0%5D.use%5B0%5D");

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./src/modules/admin/views/BookingHistoryPage.vue?vue&type=template&id=1ab5e26c":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./src/modules/admin/views/BookingHistoryPage.vue?vue&type=template&id=1ab5e26c ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"render\": function() { return /* binding */ render; }\n/* harmony export */ });\n/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ \"./node_modules/vue/dist/vue.runtime.esm-bundler.js\");\n\nconst _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", {\n  class: \"w-full bg-gray-500\"\n}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", {\n  class: \"mx-auto max-w-2xl py-4 px-4 lg:max-w-7xl lg:px-0\"\n}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"h1\", {\n  class: \"text-2xl font-bold tracking-tight text-white sm:text-3xl\"\n}, \"Booking History\")])], -1 /* HOISTED */);\nconst _hoisted_2 = {\n  class: \"px-4 bg-gray-200 h-screen sm:px-6 sm:py-4 lg:px-8\"\n};\nconst _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", {\n  class: \"sm:flex sm:items-center\"\n}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", {\n  class: \"sm:flex-auto\"\n}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(\" <div class=\\\"mt-4 sm:mt-0 sm:ml-16 sm:flex-none\\\">\\n        <button type=\\\"button\\\" @click=\\\"handleClickAddVehicle\\\"\\n          class=\\\"inline-flex items-center justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 sm:w-auto\\\">\\n          <PlusCircleIcon class=\\\"-ml-0.5 mr-2 h-4 w-4\\\" />\\n          Add book\\n        </button>\\n      </div> \")], -1 /* HOISTED */);\nconst _hoisted_4 = {\n  class: \"flex flex-col\"\n};\nconst _hoisted_5 = {\n  class: \"max-w-2xl flex py-4 px-4 lg:max-w-7xl lg:px-0\"\n};\nconst _hoisted_6 = {\n  class: \"px-2\"\n};\nconst _hoisted_7 = {\n  class: \"-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8\"\n};\nconst _hoisted_8 = {\n  class: \"inline-block min-w-full py-2 align-middle md:px-6 lg:px-8\"\n};\nconst _hoisted_9 = {\n  class: \"overflow-hidden bg-white shadow ring-1 ring-black ring-opacity-5 md:rounded-lg\"\n};\nconst _hoisted_10 = {\n  class: \"min-w-full divide-y divide-gray-300\"\n};\nconst _hoisted_11 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"thead\", {\n  class: \"bg-gray-50\"\n}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"tr\", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"th\", {\n  scope: \"col\",\n  class: \"whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6\"\n}, \" User \"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"th\", {\n  scope: \"col\",\n  class: \"whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900\"\n}, \" Tracker ID\"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"th\", {\n  scope: \"col\",\n  class: \"whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900\"\n}, \" Unit\"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"th\", {\n  scope: \"col\",\n  class: \"whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900\"\n}, \" Driver\"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"th\", {\n  scope: \"col\",\n  class: \"whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900\"\n}, \" Date Start\"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"th\", {\n  scope: \"col\",\n  class: \"whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900\"\n}, \" Date End\"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"th\", {\n  scope: \"col\",\n  class: \"whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900\"\n}, \" Destination\")])], -1 /* HOISTED */);\nconst _hoisted_12 = {\n  class: \"divide-y divide-gray-200 bg-white\"\n};\nconst _hoisted_13 = [\"onClick\"];\nconst _hoisted_14 = {\n  class: \"whitespace-nowrap px-2 py-2 text-sm text-gray-500\"\n};\nconst _hoisted_15 = {\n  class: \"whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900\"\n};\nconst _hoisted_16 = {\n  class: \"whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900\"\n};\nconst _hoisted_17 = {\n  class: \"whitespace-nowrap px-2 py-2 text-sm text-gray-900\"\n};\nconst _hoisted_18 = {\n  class: \"whitespace-nowrap px-2 py-2 text-sm text-gray-500\"\n};\nconst _hoisted_19 = {\n  class: \"whitespace-nowrap px-2 py-2 text-sm text-gray-500\"\n};\nfunction render(_ctx, _cache, $props, $setup, $data, $options) {\n  const _directive_loading = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveDirective)(\"loading\");\n  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup[\"GNotification\"], {\n    \"show-notif\": $setup.showNotif,\n    message: $setup.message\n  }, null, 8 /* PROPS */, [\"show-notif\", \"message\"]), $setup.selectedBooking ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)($setup[\"ReturnBookingModal\"], {\n    key: 0,\n    \"open-modal\": $setup.showReturnedModal,\n    \"total-paid-by-user\": $setup.totalPaidByUser,\n    \"selected-booking\": $setup.selectedBooking,\n    onCloseModal: $setup.handleCloseModal,\n    onReturnedBooking: $setup.handleClickReturned\n  }, null, 8 /* PROPS */, [\"open-modal\", \"total-paid-by-user\", \"selected-booking\"])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(\"v-if\", true), _hoisted_1, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_2, [_hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_6, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"input\", {\n    type: \"text\",\n    min: \"1\",\n    \"onUpdate:modelValue\": _cache[0] || (_cache[0] = $event => $setup.params.search = $event),\n    placeholder: \"Search Here..\",\n    class: \"w-40 rounded-md border border-gray-300 bg-white py-1 pl-3 pr-2 shadow-sm focus:border-gray-500 focus:outline-none focus:ring-1 focus:ring-gray-500 sm:text-sm\"\n  }, null, 512 /* NEED_PATCH */), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.params.search]])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"div\", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"table\", _hoisted_10, [_hoisted_11, (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)(((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"tbody\", _hoisted_12, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.bookings, book => {\n    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(\"tr\", {\n      key: book.id\n    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"td\", {\n      onClick: $event => $setup.handleLickUser(book.user),\n      class: \"whitespace-nowrap py-2 pl-4 pr-3 text-sm text-cyan-500 sm:pl-6 cursor-pointer\"\n    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.handleUserName(book.user)), 9 /* TEXT, PROPS */, _hoisted_13), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"td\", _hoisted_14, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.handleVehicleTracker(book.vehicle)), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"td\", _hoisted_15, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.handleVehicleName(book.vehicle)), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"td\", _hoisted_16, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(book.driver ? book.driver.name : book.primary_operator_name), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"td\", _hoisted_17, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.formatDateTime(book.booking_start)), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"td\", _hoisted_18, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($setup.formatDateTime(book.booking_end)), 1 /* TEXT */), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)(\"td\", _hoisted_19, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(book.destination), 1 /* TEXT */)]);\n  }), 128 /* KEYED_FRAGMENT */))])), [[_directive_loading, $setup.loading]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)($setup[\"GPagination\"], {\n    page_size: $setup.params.page_size,\n    current_size: $setup.total,\n    current_page: $setup.params.page,\n    onChange_size: $setup.handleChangeSize,\n    onChange_page: $setup.handleChangePage\n  }, null, 8 /* PROPS */, [\"page_size\", \"current_size\", \"current_page\"])])])])])])], 64 /* STABLE_FRAGMENT */);\n}\n\n//# sourceURL=webpack://car-rental-frontend/./src/modules/admin/views/BookingHistoryPage.vue?./node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use%5B0%5D!./node_modules/vue-loader/dist/templateLoader.js??ruleSet%5B1%5D.rules%5B3%5D!./node_modules/vue-loader/dist/index.js??ruleSet%5B0%5D.use%5B0%5D");

/***/ }),

/***/ "./src/modules/admin/views/BookingHistoryPage.vue":
/*!********************************************************!*\
  !*** ./src/modules/admin/views/BookingHistoryPage.vue ***!
  \********************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _BookingHistoryPage_vue_vue_type_template_id_1ab5e26c__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./BookingHistoryPage.vue?vue&type=template&id=1ab5e26c */ \"./src/modules/admin/views/BookingHistoryPage.vue?vue&type=template&id=1ab5e26c\");\n/* harmony import */ var _BookingHistoryPage_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./BookingHistoryPage.vue?vue&type=script&setup=true&lang=js */ \"./src/modules/admin/views/BookingHistoryPage.vue?vue&type=script&setup=true&lang=js\");\n/* harmony import */ var _Applications_thesis_car_rental_frontend_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ \"./node_modules/vue-loader/dist/exportHelper.js\");\n\n\n\n\n;\nconst __exports__ = /*#__PURE__*/(0,_Applications_thesis_car_rental_frontend_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__[\"default\"])(_BookingHistoryPage_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_1__[\"default\"], [['render',_BookingHistoryPage_vue_vue_type_template_id_1ab5e26c__WEBPACK_IMPORTED_MODULE_0__.render],['__file',\"src/modules/admin/views/BookingHistoryPage.vue\"]])\n/* hot reload */\nif (false) {}\n\n\n/* harmony default export */ __webpack_exports__[\"default\"] = (__exports__);\n\n//# sourceURL=webpack://car-rental-frontend/./src/modules/admin/views/BookingHistoryPage.vue?");

/***/ }),

/***/ "./src/modules/admin/views/BookingHistoryPage.vue?vue&type=script&setup=true&lang=js":
/*!*******************************************************************************************!*\
  !*** ./src/modules/admin/views/BookingHistoryPage.vue?vue&type=script&setup=true&lang=js ***!
  \*******************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": function() { return /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_40_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BookingHistoryPage_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__[\"default\"]; }\n/* harmony export */ });\n/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_40_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BookingHistoryPage_vue_vue_type_script_setup_true_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BookingHistoryPage.vue?vue&type=script&setup=true&lang=js */ \"./node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./src/modules/admin/views/BookingHistoryPage.vue?vue&type=script&setup=true&lang=js\");\n \n\n//# sourceURL=webpack://car-rental-frontend/./src/modules/admin/views/BookingHistoryPage.vue?");

/***/ }),

/***/ "./src/modules/admin/views/BookingHistoryPage.vue?vue&type=template&id=1ab5e26c":
/*!**************************************************************************************!*\
  !*** ./src/modules/admin/views/BookingHistoryPage.vue?vue&type=template&id=1ab5e26c ***!
  \**************************************************************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"render\": function() { return /* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_40_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BookingHistoryPage_vue_vue_type_template_id_1ab5e26c__WEBPACK_IMPORTED_MODULE_0__.render; }\n/* harmony export */ });\n/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_40_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_3_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_BookingHistoryPage_vue_vue_type_template_id_1ab5e26c__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./BookingHistoryPage.vue?vue&type=template&id=1ab5e26c */ \"./node_modules/babel-loader/lib/index.js??clonedRuleSet-40.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[3]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./src/modules/admin/views/BookingHistoryPage.vue?vue&type=template&id=1ab5e26c\");\n\n\n//# sourceURL=webpack://car-rental-frontend/./src/modules/admin/views/BookingHistoryPage.vue?");

/***/ })

}]);