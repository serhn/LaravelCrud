<script>
        function sendRow(){
            document.getElementById('editRow').submit();
        return false;
        }
        function deleteRow(){
            if(confirm("Удалить эту запись?"))
        document.getElementById('destroy').submit();
        return false;
        }
    </script>