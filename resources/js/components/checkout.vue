<template>
    <div class="d-flex justify-content-center">
        <div class="col-8">
            <div class="fs-5">Address Details</div>
            <div class="col-12 border-bottom py-4">
                <div class="fs-6">Contacts</div>

                <div class="row pt-3">
                    <div class="col-6">First Name *</div>
                    <div class="col-6">
                        <el-input
                            v-model="firstName"
                            placeholder="Your Name"
                            clearable
                        />
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-6">Last Name *</div>
                    <div class="col-6">
                        <el-input
                            v-model="lastName"
                            placeholder="Your Surname"
                            clearable
                        />
                    </div>
                </div>

                <div class="row pt-2">
                    <div class="col-6">Mobile Number *</div>
                    <div class="col-6">
                        <el-input
                            v-model="mobileNumber"
                            placeholder="Your mobile Number"
                            clearable
                        />
                    </div>
                </div>
            </div>

            <div class="col-12 border-bottom py-4">
                <div class="fs-6">Delivery Address</div>

                <div class="row pt-3">
                    <div class="col-6">Complex / Building</div>
                    <div class="col-6">
                        <el-input
                            v-model="building"
                            placeholder="Complex or Building Name, unit number or floor"
                            clearable
                        />
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-6">Steet Adress *</div>
                    <div class="col-6">
                        <el-input
                            v-model="street"
                            placeholder="e.g. 14 Christiaan Barnard Street"
                            clearable
                        />
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-6">Suburb *</div>
                    <div class="col-6">
                        <el-input
                            v-model="suburb"
                            placeholder="e.g. Foreshore"
                            clearable
                        />
                    </div>
                </div>

                <div class="row pt-3">
                    <div class="col-6">Province *</div>
                    <div class="col-6">
                        <el-input
                            v-model="province"
                            placeholder="e.g. Western Cape"
                            clearable
                        />
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-6">City *</div>
                    <div class="col-6">
                        <el-input
                            v-model="city"
                            placeholder="e.g. Cape Town"
                            clearable
                        />
                    </div>
                </div>
                <div class="row pt-3">
                    <div class="col-6">Postal Code *</div>
                    <div class="col-2">
                        <el-input
                            v-model="postalCode"
                            placeholder="e.g. 1687"
                            clearable
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
body {
    background-color: #f2f2f2 !important;
}
</style>
