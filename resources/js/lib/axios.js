import axios from 'axios';

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const makeRequest = async (method, url, data, config) => {
    try {
        const response = await axios[method](url, data, config);

        if (response.data) {
            return response.data;
        }
    } catch (e) {
        // To-do: Display generic server error message.
    }

    return null;
};

axios.getData = (url, data, config) => {
    if (data) {
        data = {
            params: data
        };
    }

    return makeRequest('get', url, data);
};

axios.postData = (url, data, config) => {
    return makeRequest('post', url, data);
};

axios.patchData = (url, data, config) => {
    return makeRequest('patch', url, data);
};

axios.deleteData = (url, data, config) => {
    if (data) {
        data = {
            data: data
        };
    }

    return makeRequest('delete', url, data);
};

export default axios;