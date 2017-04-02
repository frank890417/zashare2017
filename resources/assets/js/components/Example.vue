<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example {{message}} component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    module.exports={
        name: 'Greeting',
        data: () => {
            return {
                message: 'This is greeting component'
            }
        },mounted: ()=>{
            console.log("mounted");
        }
    }
</script>
