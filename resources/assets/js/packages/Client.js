import axios from 'axios';

export default class Client {
    static createLink(data, params={}) {
        params.headers = params.headers || {};
        return axios.post('http://api.' +
            window.location.host + '/v1/links', data, params);
    }
}
