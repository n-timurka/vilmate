import axios from 'axios'
import config from '@/config'

export default() => {
  return axios.create({
    baseURL: config.api_url,
    withCredentials: false,
    json: true,
    headers: {
      'Accept': 'application/json'
    }
  })
}
