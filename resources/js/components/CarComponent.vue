<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">Car Component</div>

                    <div class="card-body">
                        Estamos en el car component
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.getCars();
        },
        methods: {
            getCars: function getCars() {
              var _this = this;
             
              axios.get('/get_cars').then(function (response) {
                console.log(_this.cars);
                _this.cars = response.data;
              });
            }
        }
    }
</script>