
<script>
   
    new TomSelect("#categories",{
        // persist: false,
        // createOnBlur: true,
        allowEmptyOption: true,
        plugins: ['remove_button'],
        maxItems: 3,
        // persist: false,
        onItemAdd:function(){
            this.setTextboxValue('');
        },
    });

    new TomSelect("#locations",{
        allowEmptyOption: true,
        plugins: ['remove_button'],
        maxItems: 3,
        onItemAdd:function(){
            this.setTextboxValue('');
        },
    });

</script>




