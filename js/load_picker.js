$("#date").bootstrapMaterialDatePicker({
			weekStart: 0,
			okText: "확인",
			cancelText: "취소",
			time: false,
			format: 'YYYY-MM-DD dddd',
			minDate: new Date()
		});

$("#time-start").bootstrapMaterialDatePicker({
	date: false,
	shortTime: true,
	okText: "확인",
	cancelText: "취소",
	format: 'HH:mm'
});

$("#time-end").bootstrapMaterialDatePicker({
	date: false,
	shortTime: true,
	okText: "확인",
	cancelText: "취소",
	format: 'HH:mm'
});