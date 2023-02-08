<template>
    <center>
        <h2 class="mb-5 mt-5" mb-5>Crud Operation using Vue</h2>
    </center>
    <div class="container">
        <div class="row">
            <div class="col-md-8 form-section">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sr no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col"> Actions </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="value in list_of_employes" :key="key">

                            <th scope="row">{{ value.id }}</th>
                            <td>{{ value.name }}</td>
                            <td>{{ value.email }}</td>
                            <td>{{ value.phonenumber }}</td>
                            <td>
                                <button type="button" @click="editEmploye(value.id)" class="m-1" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <font-awesome-icon icon="edit" :style="{ color: 'blue', padding: '10px' }" />
                                </button>
                                <button type="button" @click="deleteEmploye(value.id)"><font-awesome-icon icon="remove"
                                        :style="{ color: 'red', padding: '10px' }" /></button>
                            </td>
                            <!-- <font-awesome-icon icon="edit" :style="{ color: 'blue', padding: '10px' }" />
                                <font-awesome-icon icon="remove" :style="{ color: 'red', padding: '10px' }" /> -->
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <Form @submit="saveData()">
                    <div class="mb-3">
                        <label for="Name" class="form-label">Name</label>
                        <Field type="text" v-model="employe.name" name="name" autocomplete="off" class="form-control"
                            id="name" />
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <Field type="email" class="form-control" name="email" :rules="validateEmail"
                            v-model="employe.email" id="exampleInputEmail1" aria-describedby="emailHelp" />
                        <ErrorMessage name="email" />
                    </div>
                    <div class="mb-3">
                        <label for="phonenumber" class="form-label">Phone number</label>
                        <Field type="text" class="form-control" name="phonenumber" v-model="employe.phonenumber"
                            id="phonenumber" />
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </Form>
            </div>

        </div>

        <!-- Button trigger modal -->

        <!-- Modal -->
        <!-- Button trigger modal -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <Form>
                            <div class="mb-3">
                                <label for="Name" class="form-label">Name</label>
                                <input type="text" v-model="editname" name="editname" autocomplete="off"
                                    class="form-control" id="name" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="editemail" :rules="validateEmail"
                                    v-model="editemail" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                <ErrorMessage name="email" />
                            </div>
                            <div class="mb-3">
                                <label for="phonenumber" class="form-label">Phone number</label>
                                <input type="text" class="form-control" name="editphonenumber" v-model="editphonenumber"
                                    id="phonenumber" />
                            </div>

                            <button type="submit" @click.prevent="updateEmploye" data-bs-dismiss="modal"
                                class="btn btn-primary">Submit</button>
                        </Form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {
    def
} from '@vue/shared';
import axios from 'axios';
import {
    Form,
    Field,
    ErrorMessage,
} from 'vee-validate';
export default {
    components: {
        Form,
        Field,
        ErrorMessage,
    },

    data() {
        return {
            'employe': {},
            'id': '',
            'name': '',
            'email': '',
            'phonenumber': '',
            'editname': '',
            'editemail': '',
            'editphonenumber': '',

            list_of_employes: [],
        }
    },
    mounted() {

        this.getResults();
        console.log("hey");
        axios.get('employe/list').then((response) => {
            console.log(response.data)
            this.list_of_employes = response.data
        }).catch((error) => {
            console.log(error)
        });
    },
    created() {
        console.log("hey  created");
    },

    methods: {
        validateEmail(value) {
            // if the field is empty
            if (!value) {
                return 'This field is required';
            }
            // if the field is not a valid email
            const regex = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (!regex.test(value)) {
                return 'This field must be a valid email';
            }
            // All is good
            return true;
        },
        getResults() {
            axios.get('employe/list').then((response) => {
                console.log(response.data)
                this.list_of_employes = response.data
            });
        },
        saveData() {
            // console.log("hey rahul its", this.employe);
            axios.post('/employe/create', this.employe).then(
                Response => {
                    this.getResults();
                    console.log(Response);
                    this.$toast.success(`sucessfully submited`);
                }).catch(err => {
                    console.log("error hear");
                    this.$toast.error(`not submited`, {
                        // override the global option
                        position: "top-right",
                    });
                })
        },
        editEmploye(id) {
            axios.get('edit_student/' + id)
                .then(response => {
                    this.id = response.data.id;
                    this.editname = response.data.name;
                    this.editemail = response.data.email;
                    this.editphonenumber = response.data.phonenumber;
                });
        },
        updateEmploye() {
            axios.put('update_emplye', {
                id: this.id,
                name: this.editname,
                email: this.editemail,
                phonenumber: this.editphonenumber,
            }).then(response =>
                this.$toast.success(`updated sucessfully submited`),
                this.getResults());
        },
        deleteEmploye(id) {
            if (confirm("Are you sure to delete this category ?")) {
                axios.delete('delete/' + id).then(response =>
                    this.$toast.error(`Deleted sucessfully submited`, {
                        position: "top-right",

                    }),
                    this.getResults());
            }
        }
    },
}
</script>
