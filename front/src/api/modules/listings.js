import Api from '@/api'

export default {
  getAllListings () {
    return Api().get('listings')
  },
  getListing (id) {
    return Api().get('listings/' + id)
  },
  deleteListing (id) {
    return Api().delete('listings/' + id)
  },
  addListing (data) {
    let fd = new FormData()
    for (let key in data.attributes) {
      if (data.attributes[key] != null) {
        fd.append(key, data.attributes[key])
      }
    }
    return Api().post('listings', fd, { headers: { 'Content-Type': 'multipart/form-data' } })
  },
  editListing (data) {
    let fd = new FormData()
    for (let key in data.attributes) {
      if (data.attributes[key] != null) {
        fd.append(key, data.attributes[key])
      }
    }
    return Api().post('listings/' + data.id, fd, { headers: { 'Content-Type': 'multipart/form-data' } })
  }
}
