import React, {Component} from 'react';
import Client from '../packages/Client';

export default class Form extends Component {
    constructor(props) {
        super(props);
        this.state = {
            url: '',
            error: false,
            response: null,
        };

        this.handleUrl = this.handleUrl.bind(this);
        this.clickSubmitButton = this.clickSubmitButton.bind(this);
    }

    render() {
        return (
            <div>
                <h3>Shorten URL</h3>

                {this.state.response && this.state.response.data.link ?
                    <div>
                        Your <a href={this.state.response.data.link}>link</a> has been created.
                    </div>
                    :
                    <form>
                        <div className="form-group">
                            <label htmlFor="url"
                                   className="col-sm-2 col-form-label text-danger">&nbsp;</label>
                            <div className="col-sm-7">
                                <input type="text" className="form-control" id="url" name="url" placeholder="URL"
                                       required
                                       onChange={this.handleUrl} />
                            </div>

                            {this.state.error && this.state.error.errors.url ?
                                <div className="col-sm-3">
                                    <small className="text-danger">
                                        {this.state.error.errors.url[0]}
                                    </small>
                                </div>
                            : null}
                        </div>
                        <button type="submit" className="btn btn-primary" onClick={this.clickSubmitButton}>Submit</button>
                    </form>
                }

            </div>
        );
    }

    handleUrl(event) {
        this.setState({url: event.target.value})
    }

    clickSubmitButton(e) {
        e.preventDefault();
        this.setState({error: false});

        Client.createLink({url: this.state.url})
            .then((response) => {
                this.setState({response: response.data})
            })
            .catch(error => {
                this.setState({error: error.response.data})
            });
    }
}
