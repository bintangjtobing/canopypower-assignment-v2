<template>
    <div>
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
                                <p v-if="user.subscription==2">Your current subscription is <u>weekly and monthly
                                        summary
                                        subscriptions.</u></p>
                                <p v-if="user.subscription==0">No subscription.</p>
                                <p @click='changeSettings' class="paragraphLink mt-3">Change subscription plan?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xl-3 col-lg-4 col-md-6 mb-25">
                <router-link :to="`/incident/overview`">
                    <figure class="feature-cards2 bg-primary">
                        <figcaption>
                            <h2>Incident Report</h2>
                            <p>Download report by weekly, and monthly.</p>
                        </figcaption>
                    </figure>
                </router-link>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-25">
                <router-link :to="`/users-management`">
                    <figure class="feature-cards2 bg-success">
                        <figcaption>
                            <h2>Manage Users</h2>
                            <p>Manage users in this dashboards.</p>
                        </figcaption>
                    </figure>
                </router-link>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-25">
                <router-link :to="`/analytics`">
                    <figure class="feature-cards2 bg-primary">
                        <figcaption>
                            <h2>Analytics</h2>
                            <p>You can see the analytics of the progress.</p>
                        </figcaption>
                    </figure>
                </router-link>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 mb-25">
                <router-link :to="`/system-info`">
                    <figure class="feature-cards2 bg-success">
                        <figcaption>
                            <h2>System Info</h2>
                            <p>Control your system stay health.</p>
                        </figcaption>
                    </figure>
                </router-link>
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