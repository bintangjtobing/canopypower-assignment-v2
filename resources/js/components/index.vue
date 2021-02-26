<template>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card card-default card-md p-5">
                <div class="card-body">
                    <div class="atbd-empty text-center">
                        <div class="atbd-empty__image custom">
                            <img src="/dashboard/img/logo-white.svg">
                        </div>
                        <div class="atbd-empty__text">
                            <h5>Welcome on Canopy Dashboard, {{user.name}}</h5>
                            <p v-if="user.subscription==1">Your current subscription is <u>weekly summary
                                    subscription.</u></p>
                            <p v-if="user.subscription==2">Your current subscription is <u>weekly and monthly summary
                                    subscriptions.</u></p>
                            <p v-if="user.subscription==0">No subscription.</p>
                            <p @click='changeSettings' class="paragraphLink mt-3">Change subscription plan?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        title() {
            return 'Dashboard';
        },
        data() {
            return {
                user: {},
            }
        },
        created() {
            this.loadUserLoggedIn();
        },
        methods: {
            async loadUserLoggedIn() {
                const resp = await axios.get('api/getUserLoggedIn');
                this.user = resp.data;
            },
            changeSettings() {
                this.$router.push('/detail/user/' + this.user.id);
            }
        },
    }
</script>