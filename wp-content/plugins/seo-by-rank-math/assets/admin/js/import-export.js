!function(e){var t={};function r(a){if(t[a])return t[a].exports;var n=t[a]={i:a,l:!1,exports:{}};return e[a].call(n.exports,n,n.exports,r),n.l=!0,n.exports}r.m=e,r.c=t,r.d=function(e,t,a){r.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:a})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(e,t){if(1&t&&(e=r(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var a=Object.create(null);if(r.r(a),Object.defineProperty(a,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)r.d(a,n,function(t){return e[t]}.bind(null,n));return a},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,"a",t),t},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},r.p="",r(r.s=326)}({326:function(e,t,r){"use strict";var a;(a=jQuery)(function(){({init:function(){var e=this;a(document.body).on("click",".rank-math-action",function(t){var r=a(this).data("action");r in e&&e[r](t)}),this.importConfirm()},importConfirm:function(){var e=a("#import-me");e.on("change",function(){e.removeClass("invalid")}),a("#rank-math-import-form").on("submit",function(t){if(!e.get(0).files.length)return e.addClass("invalid"),void t.preventDefault();confirm(rankMath.importConfirm)||t.preventDefault()})},createBackup:function(e){var t=this,r=a(e.currentTarget);r.prop("disabled",!0),t.ajax("create_backup").always(function(){r.prop("disabled",!1)}).done(function(e){if(e.success){var n=r.parent().find("tbody"),o=n.find("tr:first").clone();o.removeClass("hidden").find("th").html(e.backup),o.find("[data-action]").attr("data-key",e.key),n.prepend(o),a("#rank-math-no-backup-message").addClass("hidden"),t.addNotice(e.message,"success",a(".wp-header-end"),2e3)}else t.addNotice(e.error,"error",a(".wp-header-end"),2e3)})},restoreBackup:function(e){if(confirm(rankMath.restoreConfirm)){var t=this,r=a(e.currentTarget);r.prop("disabled",!0),t.ajax("restore_backup",{key:r.attr("data-key")}).always(function(){r.prop("disabled",!1)}).done(function(e){e.success?t.addNotice(e.message,"success",a(".wp-header-end"),2e3):t.addNotice(e.error,"error",a(".wp-header-end"),2e3)})}},deleteBackup:function(e){if(confirm(rankMath.deleteBackupConfirm)){var t=this,r=a(e.currentTarget);r.prop("disabled",!0),t.ajax("delete_backup",{key:r.data("key")}).always(function(){r.prop("disabled",!1)}).done(function(e){if(e.success){var n=r.closest("table");r.closest("tr").fadeOut(function(){a(this).remove(),1>n.find("tr").length&&a("#rank-math-no-backup-message").show()}),t.addNotice(e.message,"success",a(".wp-header-end"),2e3)}else t.addNotice(e.error,"error",a(".wp-header-end"),2e3)})}},importPlugin:function(e){if(confirm(rankMath.importConfirm)){var t=a(e.currentTarget);t.prop("disabled",!0);var r=a.map(t.closest("tr").next("tr").find("input:checkbox:checked"),function(e){return e.value});if(1>r.length)this.addNotice("Select data to import.","error",a(".wp-header-end"),2e3);else{t.data("active")&&r.push("deactivate");var n=a('<textarea id="import-progress-area" class="import-progress-area large-text" disabled="disabled" rows="8" style="margin: 20px 0;background: #eee;"></textarea>');a("#import-progress-area").remove(),t.closest(".list-table").after(n),this.addLog("Import started...",n),this.ajaxImport(t.data("slug"),r,n,null,function(){t.prop("disabled",!1),setTimeout(function(){n.fadeOut(function(){n.remove()})},3e3)})}}},ajaxImport:function(e,t,r,a,n){var o=this;if(0===t.length)return o.addLog("Import finished.",r),void n();var i=t.shift();a=a||1,o.addLog("deactivate"===i?"Deactivating plugin":"Importing "+i,r),o.ajax("import_plugin",{perform:i,pluginSlug:e,paged:a}).done(function(a){var s=1;a&&a.page&&a.total_pages>a.page&&(s=a.page+1,t.unshift(i)),o.addLog(a.success?a.message:a.error,r),o.ajaxImport(e,t,r,s,n)}).fail(function(a){o.addLog(a.statusText,r),o.ajaxImport(e,t,r,null,n)})},addLog:function(e,t){var r=new Date,a=t.val()+"["+(10>r.getHours()?"0":"")+r.getHours()+":"+(10>r.getMinutes()?"0":"")+r.getMinutes()+":"+(10>r.getSeconds()?"0":"")+r.getSeconds()+"] "+e+"\n";t.text(a).scrollTop(t[0].scrollHeight-t.height()-20)},cleanPlugin:function(e){if(confirm(rankMath.cleanPluginConfirm)){var t=this,r=a(e.currentTarget);r.prop("disabled",!0),t.ajax("clean_plugin",{pluginSlug:r.data("slug")}).always(function(){r.prop("disabled",!1)}).done(function(e){e.success&&r.closest("tr").fadeOut(function(){a(this).remove()}),t.addNotice(e.success?e.message:e.error,e.success?"success":"error",a(".wp-header-end"),2e3)})}},ajax:function(e,t,r){return a.ajax({url:rankMath.ajaxurl,type:r||"POST",dataType:"json",data:a.extend(!0,{action:"rank_math_"+e,security:rankMath.security},t)})},addNotice:function(e,t,r,n){t=t||"error",n=n||!1;var o=a('<div class="notice notice-'+t+' is-dismissible"><p>'+e+"</p></div>").hide();a(".notice").hide(),r.after(o),o.slideDown(),a(document).trigger("wp-updates-notice-added"),n&&setTimeout(function(){o.fadeOut(function(){o.remove()})},n)}}).init()})}});