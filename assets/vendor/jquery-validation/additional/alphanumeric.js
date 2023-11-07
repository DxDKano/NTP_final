$.validator.addMethod("alphanumeric", function(value, element) {
	return this.optional(element) || /^\w+$/i.test(value);
}, "Hanya boleh huruf, angka, dan underscore, tidak boleh spasi");
