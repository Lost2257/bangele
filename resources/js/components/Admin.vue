<template>
    <div class="container-fluid ">
        <table class="table table-dark">
            <thead>
            <tr class="table-active">
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody v-for="email in emails.data " :key=email.id>
            <tr class="table-active">
                <th scope="row">{{ email.id }}</th>
                <td>{{ email.email }}</td>
                <td>
            <span class="btn btn-danger" v-on:click="deleteEmail(email.id)">
                <i class="fas fa-trash-alt"></i>
                Delete
            </span>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="container row">
            <div class="col-sm-6">
        <pagination :data="emails" @pagination-change-page="loadEmails"></pagination>
            </div>
            <div class="col-sm-6">
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        Is viso : {{ susckaiciuota }}
                    </div>
                </div>
            </div>
        </div>
<!--        nuotraukos-->
<!--        nuotraukos-->
    </div>

</template>

<script>

export default {
    data() {
        return {
            emails: [],
            currentPage: 1,
            rows: 10,
            perPage: 5,
            susckaiciuota: ''
        }
    },
    mounted() {
        this.loadEmails();
        axios.get('/api/count')
            .then(response => this.susckaiciuota = response.data)
    },
    methods: {
        loadEmails: function (page = 1) {
            axios.get('/api/stats?page=' + page)
                .then((response) => {
                    this.emails = response.data;

                })
            this.emails = {}
        },
        deleteEmail: function (email) {
            if (!window.confirm('are you sure to delete ')) {
                return;
            }
            try {
                axios.get('/api/delete' + email).then((response) => {
                    this.loadEmails();
                })
            } catch (errors) {

            }
        },
    }
}
</script>
