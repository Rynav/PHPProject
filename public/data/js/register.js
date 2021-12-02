new Cleave(".ccnumber", {
    creditCard: true,
    delimeter: '-',
    onCreditCardTypeChange: function(type){
    }
})

new Cleave(".ccexp",{
    date: true,
    datePattern: ["m","Y"]
})

new Cleave(".cccvc",{
    numeral: true,
    numeralPositiveOnly: true
})

new Cleave(".socialcredit",{
    numeral: true,
    numeralPositiveOnly: true
})

